<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        if(auth()->guard('admin')->attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
            ])){
                $user = auth()->guard('admin')->user();

                if($user->rank == 1){
                    return redirect()->route('adminDashboard')->with('success', 'You are logged in as admin');
                }else{
                    session()->flush();
                    return redirect()->route('adminDashboard');
                }
            }else{
                return back()->with('error', 'Invalid creds');
            }
    }

    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();
        Session::flush();
        return redirect(route('adminLogin'))->with('success', 'You are logged out');
    }
}
