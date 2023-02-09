<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddPaymentToSales;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'action'=>'required',
        ]);   

        if($data['action'] === 'Confirmed'){
            $payment = AddPaymentToSales::find($data['payment_id']);
           // return $payment;
            if(!$payment){
                return back()->with('error', 'Payment not found');
            }
            DB::transaction(function () use ($payment) {
                $realtor = User::find($payment['user_id']);
                $direct_referrer = User::where('ref_code', $realtor['ref_by'])->first();
                if($direct_referrer){
                    // todo
                }
            });

        }
    }
}
