<?php

namespace App\Helpers;

use App\Models\User;
use App\Helpers\Referer;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserStatus
{
    public function isVerified($user_id)
    {
        $user = User::select('verified')->where('id', $user_id)->first();
        return $user->verified ? true : false;  
    }   

    public function isActive($user_id)
    {
        $user = User::select('active')->where('id', $user_id)->first();
        return $user->active ? true : false;
    }

    public function service($user_id)
    {
        $user = User::select('service')->where('id', $user_id)->first();
        return $user->service;
    }

    public function realtorType($user_id)
    {
        $user = User::select('realtor_type')->where('id', $user_id)->first();
        return $user->realtor_type;
    }

    public function shouldSkipPayment($ref_by)
    {
        $referer = new Referer;
        $limit = Setting::select('group_free_reg_count')->first()->group_free_reg_count;
        $check_user = User::where('ref_code', $ref_by)->first();
            
        if ($check_user->base_referrer != null) 
        { 
            return $referer->CountGroupDownline($ref_by) > $limit ? false : true;
        }
        return false;          
    }

    public function skipPayment($ref_by)
    {
        $limit = Setting::select('group_free_reg_count')->first()->group_free_reg_count;        
        $base_referrer = User::select('base_referrer')->where('ref_code', $ref_by)->first()->base_referrer;

        if($base_referrer != null){
         $base_referrer = User::where('base_referrer',$base_referrer)->count();

         return $base_referrer > ($limit+2) ? false : true;
        }

        return false;
    }

    public function isPaid($user_id)
    {
       $status = User::select('one_time_billing')->where('id', $user_id)->first()->one_time_billing;
       if($status == 1 || $status == 11)
       {
        return true;
       }
       
    }

    public function autoFillGroupDetails($user_id, $ref_by)
    {
        $group = User::select('group_name', 'group_address', 'group_official_email','group_phone','group_logo', 'group_website','base_referrer')
            ->where('ref_code', $ref_by)->first();

        $updated  = User::where('id', $user_id)
                ->update([
                    'group_name'=>$group->group_name,
                    'group_address'=>$group->group_address, 
                    'group_official_email'=>$group->group_official_email,
                    'group_phone'=>$group->group_phone,
                    'group_logo'=>$group->group_logo, 
                    'group_website'=>$group->group_website,
                    'base_referrer'=>$group->base_referrer, 
                ]);
        if($updated)
        {
            return true;
        }
    }

    public function getBadge($user_id)
    {
        if($this->realtorType($user_id) != null && $this->isVerified($user_id) == true && $this->isPaid($user_id)== true && $this->isActive($user_id) == true)
        {
           return $badge = 'Active';
        }
        else{
            return $badge = 'Inactive';
        }
        return 'Unknown';
    }

    public function preInserts($user)
    {

        $kin = DB::table('next_of_kin')->where('user_id', $user->id)->first();
        $account_details = DB::table('account_details')->where('user_id', $user->id)->first();

        if($kin == null)
        {
            DB::table('next_of_kin')->insert(['user_id'=>$user->id]);       
        }    
        if($account_details == null)
        {
            $account_name = $user->last_name.' '.$user->first_name;
            DB::table('account_details')->insert(['user_id'=>$user->id, 'beneficiary_name'=>$account_name, 'bvn'=>$user->bvn]);
        }      
        
    }

    public function getRegAmount()
    {
        $amount = Setting::select('individual_payment_amount', 'group_payment_amount')->first();
        return $amount;
    }
    
}

?>