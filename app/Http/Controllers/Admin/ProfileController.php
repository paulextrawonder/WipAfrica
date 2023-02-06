<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Validation;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function password()
    {
        return view('admin.account-password');
    }

    public function changePassword(Request $request, Admin $user)
    {
        $validation = new Validation;
        $data = $validation->changePassword($request);

        $admin = Auth::guard('admin')->user();

        if (!Hash::check($data['current_password'], $admin->password)) {
            return back()->with('error', 'Invalid Creds!');
        }
        if (Hash::check($data['password'], $admin->password)) {
          return back()->with('warning', 'You cannot repeat old passwords');
        }
        
        $password = Hash::make($data['password']);

        $admin->update(['password'=>$password]);

        $request->session()->flush();
        
        return redirect(route('adminLogin'))->with('success', 'Password changed successfully');

    }
}
