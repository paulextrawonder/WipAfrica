<?php

namespace App\Http\Controllers;

use App\Helpers\GenerateRandomString;
use App\Helpers\Validation;
use App\Mail\AddPaymentToSaleMail;
use App\Mail\NewSalePaymentMail;
use App\Models\AddPaymentToSales;
use App\Models\Property;
use App\Models\Sales;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SalesController extends Controller
{
    protected function uploadPath()
    {
        return 'properties/';
    }

    public function sales()
    {
        try{
            $properties = Property::select('id', 'estate_name', 'property_name', 'property_type', 'amount', 'commission')
            ->where(['status'=>1, 'sold'=>0, 'verified'=>1])->get();
        }catch(Exception $e){

            return back();
        }

        $sales = Sales::select(
            'sales.id',
            'sales.user_id', 
            'property_id',
            'client_full_name',
            'client_email',
            'client_phone',
            'no_of_unit',
            'total_price',
            'amount_paid',
            'estate_name',
            'property_name',
            'property_type',
            )
        ->join('properties', 'properties.id', 'sales.property_id')
        ->where('sales.user_id', Auth::id())->get();

        $data = [];
        foreach($sales as $key=>$sale){
            $data[$key]['sales'] = $sale;

            $payments = AddPaymentToSales::where('user_id', Auth::id())
            ->where('sales_id', $sale->id)->orderBy('id', 'desc')->get();

            if($payments){
                $data[$key]['payments'] = $payments;
            }
        }

        return view('user.sales', compact('properties', 'data'));
    }

    public function addSales(Request $request)
    {
       $helpers = new Validation;
       $data =  $helpers->addSales($request);
    
       $data['user_id'] = Auth::id();

       $data['total_price'] = preg_replace('/[a-zA-Z,]/', '', $data['total_price']);

       $property = Property::find($data['property_id']);
       $balance = (int)$data['total_price'] - (int)$data['amount_paid'];
       $percentage = (int)$property['commission'];
       $commision = ($percentage/100) * $data['amount_paid'];
       
       $now = Carbon::now()->format('hms');

       $data["total_price"] = (int)$data['total_price'];
       $data["amount_paid"] = (int)$data['amount_paid'];

       if(!empty($data['client_form']))
       {
          $data['client_form'] = 'client_form-'.$property['property_name'].'-user_id='.$data['user_id'].'-'.$now.'.'.$data['client_form']->extension();
          $request['client_form']->move(public_path($this->uploadPath().'/client_form'), $data['client_form']);
       }

       if(!empty($data['payment_proof']))
       {
          $data['payment_proof'] = 'payment_proof-'.$property['property_name'].'-user_id='.$data['user_id'].'-'.$now.'.'.$data['payment_proof']->extension();
          $request['payment_proof']->move(public_path($this->uploadPath().'/payment_proof'), $data['payment_proof']);
       }

       $payment_proof = $data['payment_proof'];

       $explode = explode('|', $data['property_id']);
       $data['property_id'] = $explode[0];

       unset($data['payment_proof']);
          
        try {
            DB::transaction(function () use ($data, $balance, $payment_proof, $commision) {
                $created = Sales::create($data);
                AddPaymentToSales::create([
                    'user_id'=> Auth::id(),
                    'sales_id'=>$created->id,
                    'added_amount'=>$created->amount_paid,
                    'balance'=>$balance,
                    'payment_proof' => $payment_proof,
                    'commission_amount' => $commision,
                ]);
            });

            Mail::to(config('app.admin_email_address'))->send(new NewSalePaymentMail(Auth::user(), $data['amount_paid']));
           } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
           }

       return back()->with('success', 'Payment added and waiting for approval');
    }

    public function addPaymentToSales(Request $request)
    {
        $helpers = new Validation;
        $data = $helpers->addPaymentToSales($request);

        $last_payment = AddPaymentToSales::where('user_id', Auth::id())
        ->where('sales_id', $data['sales_id'])
        ->orderBy('id', 'desc')
        ->first();

        $sale = Sales::find($last_payment['sales_id']);

        $percentage = Property::select('commission')->where('id', $sale['property_id'])->first();

        $commission = (int)$percentage['commission'];       

        $previous_balance =  $last_payment->balance;

        $balance = $previous_balance - (int)$data['added_amount'];

        if($balance < 0 ){
            return back()->with('error', 'Amount must not exceed balance, if this was intentional pls reach out to an admin');
        }
        $data['user_id'] = Auth::id();
        $data['balance'] = $balance;
        $data['status'] = 'Pending';
        $data['commission_amount'] = ($commission/100) * $data['added_amount'];

        $helper = new GenerateRandomString;
        $string = $helper->getString(10).'.'.Carbon::now()->format('ymshmssi');
 
        if(!empty($data['payment_proof']))
        {
           $data['payment_proof'] = $string.'.'.$data['payment_proof']->extension();
           $request['payment_proof']->move(public_path($this->uploadPath().'/payment_proof'), $data['payment_proof']);
        }

        try {
            AddPaymentToSales::create($data);

            Mail::to(config('app.admin_email_address'))->send(new AddPaymentToSaleMail(Auth::user(), $data['added_amount']));
        } catch (Exception $e) {
            return back()->with('error', 'Sorry we could process your request at the moment'.$e->getMessage());
        }
        
        return back()->with('success', 'Payment addedd successfully and waiting for verification');
    }
}
