<?php

namespace App\Helpers;

use App\Models\Setting;
use App\Models\User;
use App\Helpers\UserStatus;
use Illuminate\Support\Facades\Auth;

class Referer
{

    public function __construct()
     {
         $this->user_status = new UserStatus;
     }

    public function SanitizeRefCode($ref)
    {
        return $ref_code = preg_replace('/[^A-Za-z0-9\-]/', '', trim(strtolower($ref)));
    }

    public function GetRefCodeById($id)
    {
        $user = User::select('ref_code')->where('id', $id)->first();
        return $user->ref_code;
    }
    public function ValidateRefCode($value = null)
    {
        if($value){
            $ref_code = $this->SanitizeRefCode($value);
            $user = User::where('ref_code', $ref_code)->first();
            return $user;
        }
            return false;
    }

    public function AssignRefCodeToGroup()
    {
        $last_user = User::select('ref_code')
        ->where('realtor_type', 'group')
        ->where('ref_code','!=', '')
        ->orderBy('id', 'desc')
        ->first();
        if($last_user)
        {
            $last_user->ref_code = explode('-', $last_user->ref_code);
            $ref_code = (int)$last_user->ref_code[2];
            $new_ref_code = strtolower('wip'.str_pad($ref_code + 1, 5, 0, STR_PAD_LEFT));
            return $new_ref_code;
        }
        return $new_ref_code = strtolower('wip'.str_pad(0 + 1, 5, 0, STR_PAD_LEFT));
    }

    public function AssignRefCodeToIndividual()
    {
        $last_user = User::select('ref_code')
        ->where('ref_code','!=', '')
        ->orderBy('id', 'desc')
        ->first();
        
        if($last_user)
        {
            $last_user->ref_code = explode('-', $last_user->ref_code);
            $ref_code = (int)$last_user->ref_code[1];
            $new_ref_code = strtolower('wbn-'.str_pad($ref_code + 1, 5, 0, STR_PAD_LEFT));
            
            return $new_ref_code;
        }
        return $new_ref_code = strtolower('wbn-'.str_pad(0 + 1, 5, 0, STR_PAD_LEFT));
    }

    public function AssignRefCodeToDownline($ref)
    {
        $validate_ref = $this->ValidateRefCode($ref);

        if ($validate_ref) 
        {
            $last_referred_user = User::where('ref_by', $validate_ref->ref_code)->orderBy('id', 'desc')->first();

            if($last_referred_user)
            {
                //splitted the ref_code string into array so i can get the last value
                $last_referred_user = explode('-', $last_referred_user->ref_code);
                //Extracted the last string and converted to integer
                $last_digit = (int)$last_referred_user[2];
                //Increased the last digit by 1
                $last_referred_user[2] = $last_digit + 1;
                //coupled the splitted array back to string but with the new digit
                $new_ref_code = implode('-',$last_referred_user);

                return $new_ref_code;
            }

            $new_ref_code = $validate_ref->ref_code. "-". 1;
            return $new_ref_code;

        }
    }

    public function CountGroupDownline($ref_code)
    {
        $downlines = User::select('ref_code')->where('ref_by', $ref_code)->get();
        return $this->countDownlines($downlines);
    }

    public function countDownlines($users) {
        $count = 0;
        $count += count($users);
        foreach($users as $user) {
            $downlines = User::select('ref_code')->where('ref_by', $user->ref_code)->get();
            $count += $this->countDownlines($downlines);
        }
        return $count;
    }

    // public function canRefHaveDownline($ref_by)
    // {
    //     $user = User::where('ref_code', $ref_by)->first();
    //     if($user->service == 'realtor' && $user->realtor_type == 'individual')
    //     {
    //         $limit = Setting::select('i_realtor_limit')->first()->i_realtor_limit;
    //         $count = User::where('ref_by', $user->ref_code)->count();
    //         return $count < $limit ? true:false;  
    //     }
    //     return true;
    // }
    
    
}

?>