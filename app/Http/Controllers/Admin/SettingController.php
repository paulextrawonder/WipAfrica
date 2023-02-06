<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function account()
    {
        $account = Setting::find(1);
        return view('admin.account-settings', compact('account'));
    }

    public function setAccount(Request $request)
    {
        $data = $request->validate([
            'account_no' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
        ]); 

        try{
            if($account = Setting::find(1)){
                $account->update($data);
            }else{
                Setting::create($data);
            }
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }

        return back()->with('success', 'Account updated successfully');
    }
}
