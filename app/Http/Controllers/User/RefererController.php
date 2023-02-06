<?php

namespace App\Http\Controllers\user;

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
    public function __construct()
    {
        $this->referer = new Referer;
        $this->user_status = new UserStatus;
    }

    public function index()
    {
        $downline = new Downline;
        $downlines = ($downline->getDownlines(Auth::user()));

        return view('user.referral', compact('downlines'));
    }
}
