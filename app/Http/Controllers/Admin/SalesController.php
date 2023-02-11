<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SalePaymentConfirmationMail;
use App\Models\AddPaymentToSales;
use App\Models\Commission;
use App\Models\Sales;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SalesController extends Controller
{
    public function sales()
    {
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
            'users.first_name as realtor_first_name',
            'users.last_name as realtor_last_name',
            'users.ref_code as realtor_ref_code',
            )
        ->join('properties', 'properties.id', 'sales.property_id')
        ->join('users', 'users.id','sales.user_id')
        ->orderBy('sales.id', 'desc')->get();

        $data = [];
        foreach($sales as $key=>$sale){
            $data[$key]['sales'] = $sale;

            $payments = AddPaymentToSales::where('user_id', $sale->user_id)
            ->where('sales_id', $sale->id)->orderBy('id', 'desc')->get();

            if($payments){
                $count = 0;
                foreach ($payments as $key2 => $payment) {
                    if($payment['status'] == 'Pending'){
                        $data[$key]['sales']['pending_conf'] = ++$count;
                    }else{
                        $data[$key]['sales']['pending_conf'] = $count;
                    }
                }
                $data[$key]['payments'] = $payments;
            }
        }

        return view('admin.sales', compact('data'));
    }

    public function viewSales($sale_id, $user_id)
    {
        $sales = Sales::select(
            'sales.id',
            'sales.user_id', 
            'property_id',
            'client_full_name',
            'client_email',
            'client_phone',
            'client_gender',
            'client_form',
            'no_of_unit',
            'total_price',
            'amount_paid',
            'estate_name',
            'property_name',
            'property_type',
            'property_id',
            'commission',
            )
        ->join('properties', 'properties.id', 'sales.property_id')
        ->join('users', 'users.id', 'sales.user_id')
        ->where('sales.user_id', $user_id)
        ->first();

        $realtor = User::where('id', $sales['user_id'])->first();

        $payments = AddPaymentToSales::where('sales_id', $sale_id)
        ->where('user_id', $user_id)
        ->orderBy('id', 'desc')->get();

        $total_amount_paid = 0;
        foreach($payments as $key=>$payment){
            $total_amount_paid = $total_amount_paid + $payment['added_amount'];
            $payments[$key]['commission'] = $sales['commission'];
        }

        $data['sales'] = $sales;
        $data['sales']['total_amount_paid'] = $total_amount_paid;
        $data['sales']['balance_to_be_paid'] = $sales['total_price'] - $total_amount_paid;
        $data['realtor'] = $realtor;
        $data['payments'] = $payments;

     return view('admin.view-sale', compact('data'));
    }

    public function confirmSale(Request $request)
    {
        $data = $request->validate([
            'payment_id'=>'required',
            'user_id'=>'required',
            'commission'=>'required',
            'commission_amount'=>'required',
            'action'=>'required',
        ]);   

        if($data['action'] === 'Confirmed'){
            $payment = AddPaymentToSales::find($data['payment_id']);
            if(!$payment){
                return back()->with('error', 'Payment not found');
            }

            $realtor = User::find($data['user_id']);

            DB::transaction(function () use ($payment, $data, $realtor) {

                $payment->update([
                    'status'=>'Confirmed',
                ]);
                
                $realtor_commisson = [];
                $realtor_commisson['user_id'] = $realtor['id']; 
                $realtor_commisson['sale_id'] = $payment['sales_id']; 
                $realtor_commisson['payment_id'] = $data['payment_id']; 
                $realtor_commisson['amount_paid'] = $payment['added_amount']; 
                $realtor_commisson['commission'] = $data['commission']; 
                $realtor_commisson['commission_amount'] =(($data['commission']/100)*$payment['added_amount']); 
                $realtor_commisson['commission_type'] = 'Direct Commission'; 
                $realtor_commisson['status'] = 'Pending'; 

                Commission::create($realtor_commisson);

                $direct_referrer = User::where('ref_code', $realtor['ref_by'])->first();
                $direct_ref = [];
                if($direct_referrer){
                    $direct_ref['user_id'] = $direct_referrer['id']; 
                    $direct_ref['sale_id'] = $payment['sales_id'];  
                    $direct_ref['payment_id'] = $data['payment_id']; 
                    $direct_ref['amount_paid'] = $payment['added_amount']; 
                    $direct_ref['commission'] = 10; 
                    $direct_ref['commission_amount'] =(($direct_ref['commission']/100)*$payment['added_amount']); 
                    $direct_ref['commission_type'] = 'First Level Commission'; 
                    $direct_ref['status'] = 'Pending'; 

                    Commission::create($direct_ref);

                    $first_level_downline = User::where('ref_code', $direct_referrer['ref_by'])->first();

                    $first_level = [];
                    if($first_level_downline){
                        $first_level['user_id'] = $first_level_downline['id']; 
                        $first_level['sale_id'] = $payment['sales_id']; 
                        $first_level['payment_id'] = $data['payment_id']; 
                        $first_level['amount_paid'] = $payment['added_amount']; 
                        $first_level['commission'] = 2; 
                        $first_level['commission_amount'] =(($first_level['commission']/100)*$payment['added_amount']); 
                        $first_level['commission_type'] = 'Second Level Commission'; 
                        $first_level['status'] = 'Pending';

                        Commission::create($first_level);
                    }
                    
                }
            });

            try {
                $data['amount'] = $payment['added_amount'];
                Mail::to($realtor->email)->send(new SalePaymentConfirmationMail($realtor, $data));
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
                session()->flash('error', 'Email could not be sent '. $e->getMessage());
                return $e->getMessage();
            }
        }else if($data['action'] == 'Declined'){
            $payment = AddPaymentToSales::find($data['payment_id']);
            $payment->update([
                'status'=>'Declined',
            ]);
        }else{
            return 'Pending';
        }

        return back()->with('success', 'Sale Payment has been confirmed');
    }
}
