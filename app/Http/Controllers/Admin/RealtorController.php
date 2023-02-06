<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Downline;
use App\Http\Controllers\Controller;
use App\Models\NextOfKin;
use App\Models\Sales;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class RealtorController extends Controller
{
    public function isActive()
    {
        $active = User::where('is_active', true)->orderBy('id', 'desc')->get();

        $data = [];
        foreach($active as $key=>$active){
           $data[$key]['realtor'] = $active;
           $data[$key]['sales'] =  Sales::where('sales.user_id', $active['id'])->count();
           $data[$key]['ref'] =  User::where('ref_by', $active['ref_code'])->count();
        }

        return view('admin.active-realtors', compact('data'));
    }

    public function isBlocked()
    {
        $blocked = User::where('is_active', false)->orderBy('id', 'desc')->get();

        $data = [];
        foreach($blocked as $key=>$blocked){
           $data[$key]['realtor'] = $blocked;
           $data[$key]['sales'] =  Sales::where('sales.user_id', $blocked['id'])->count();
           $data[$key]['ref'] =  User::where('ref_by', $blocked['ref_code'])->count();
        }
        return view('admin.block-realtors', compact('data'));
    }

    public function blockRealtor(User $id)
    {
        try{
          $id->update(['is_active'=> false]);
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'User has been blocked');
    }

    public function unblockRealtor(User $id)
    {
        try{
          $id->update(['is_active'=> true]);
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'User has been unblocked');
    }

    public function realtorProfile(User $id)
    {
        $data['realtor'] = $id;
        $data['nok'] = NextOfKin::where('user_id', $id->id)->first(); 
        
        $downline = new Downline;
        $data['downlines'] = ($downline->getDownlines($id));

        return view('admin.realtors-profile', compact('data'));
    }
}
