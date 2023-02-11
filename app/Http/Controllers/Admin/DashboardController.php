<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddPaymentToSales;
use App\Models\Commission;
use App\Models\Property;
use App\Models\Sales;
use App\Models\Support;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $count['realtors'] = User::count();
        $count['supports'] = Support::where('status', 'waiting')->orWhere('action','open')->count();
        $count['projects'] = Property::count();
        $count['sales'] = Sales::count();
        $count['commission'] = Commission::where('status', 'Paid')->sum('commission_amount');
        $count['confirmed_payments'] = AddPaymentToSales::where('status', 'Confirmed')->sum('added_amount');

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
        ->join('properties', 'properties.id', 'sales.property_id')->get();

        $data = [];
        foreach($sales as $key=>$sale){
            $data[$key]['sales'] = $sale;

            $payments = AddPaymentToSales::where('sales_id', $sale->id)->orderBy('add_payment_to_sales.id', 'desc')->get();

            if($payments){
                $data[$key]['payments'] = $payments;
            }
        }

       // return $data;
        
        return view('admin.dashboard', compact('data', 'count'));
    }
}
