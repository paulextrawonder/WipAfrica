<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function commission()
    {
        return view('admin.comission');
    }

    public function createCommission(Request $request)
    {
        return $request;
    }
}
