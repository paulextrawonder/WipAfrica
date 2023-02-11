<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommissionController extends Controller
{
    public function index()
    {
        $commissions = Commission::select(
            "commissions.id",
            "commissions.user_id",
            "commissions.commission",
            "commissions.commission_amount",
            "commissions.commission_type",
            "commissions.amount_paid",
            "commissions.status",
            "estate_name",
            "property_name",
            "property_type",
            "properties.amount",
            "first_name",
            "last_name",
            "client_full_name",
            "sales.no_of_unit",
            "bank_account_no",
            "bank_name",
            "bank_beneficiary_name",
        )
        ->join('sales', 'sales.id', 'commissions.sale_id')
        ->join('properties', 'properties.id', 'sales.property_id')
        ->join('users', 'users.id', 'commissions.user_id')
        ->where('commissions.user_id', Auth::id())
        ->orderBy('commissions.id', 'desc')
        ->get();

        return view('user.comission', compact('commissions'));
    }
}
