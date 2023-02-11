<?php

namespace App\Http\Controllers\User;

use App\Helpers\Downline;
use App\Http\Controllers\Controller;
use App\Models\AddPaymentToSales;
use App\Models\Commission;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardConstroller extends Controller
{
    public function index()
    {
        $data['amount_earned'] = AddPaymentToSales::where('user_id', Auth::id())->where('status', 'Confirmed')->sum('commission_amount');
        $data['paid_commission'] = Commission::where('user_id', Auth::id())->where('status', 'Paid')->sum('commission_amount');
        $properties = Property::orderBy('id', 'desc')->get();
        return view('user.dashboard', compact('properties', 'data'));
    }
}
