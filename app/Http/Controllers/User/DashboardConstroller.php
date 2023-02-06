<?php

namespace App\Http\Controllers\User;

use App\Helpers\Downline;
use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardConstroller extends Controller
{
    public function index()
    {
        $properties = Property::orderBy('id', 'desc')->get();
        return view('user.dashboard', compact('properties'));
    }
}
