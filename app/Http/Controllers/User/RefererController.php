<?php

namespace App\Http\Controllers\User;

use App\Helpers\Downline;
use App\Helpers\Referer;
use App\Helpers\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefererController extends Controller
{

    public function index()
    {
        $downline = new Downline;
        $downlines = ($downline->getDownlines(Auth::user()));

        return view('user.referral', compact('downlines'));
    }
}
