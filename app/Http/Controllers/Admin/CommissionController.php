<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use Exception;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function commission()
    {
        $commissions = Commission::select(
            "commissions.id",
            "commissions.commission",
            "commissions.commission_amount",
            "commissions.commission_type",
            "commissions.amount_paid",
            "commissions.status",
            "estate_name",
            "property_type",
            "property_type",
            "first_name",
            "last_name",
            "client_full_name",
            "bank_account_no",
            "bank_name",
            "bank_beneficiary_name",
        )
        ->join('sales', 'sales.id', 'commissions.sale_id')
        ->join('properties', 'properties.id', 'sales.property_id')
        ->join('users', 'users.id', 'commissions.user_id')->get();

        return view('admin.comission', compact('commissions'));
    }

    public function payCommission(Request $request)
    {
        $ids = $request->ids;
        $check = $request->check;

        for ($i=0; $i < count($check) ; $i++) {
            if($check[$i]){
                try{
                    $commission = Commission::find($ids[$i]);
                    $commission->update(['status'=>'Paid']);

                }catch(Exception $e){
                    return back()->with('error', $e->getMessage());
                }
            }
        }

        return back()->with('success', 'Payout has been made successfully');
    }
}
