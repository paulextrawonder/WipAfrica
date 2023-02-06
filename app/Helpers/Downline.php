<?php

namespace App\Helpers;

use App\Models\User;
use App\Helpers\UserStatus;
use App\Models\Downline as DownlineModel;
use Illuminate\Support\Facades\Redirect;

class Downline
{

    public function __construct()
     {
         $this->user_status = new UserStatus;
     }

     public function createDownline($user)
    {      
        if(!empty($user['ref_by']) || $user['ref_by'] != null && (!empty($user['email'])))
        {
          $realtor_and_downline = User::where('email',$user['email'])
            ->orWhere('ref_code', $user['ref_by'])->get();

            DownlineModel::create([
                'user_id' =>$realtor_and_downline[0]->id,
                'first_level_downline_id' =>$realtor_and_downline[1]->id
            ]);

            $this->createSecondLevelDownline($user);
        }

        return Redirect::back();
    }

    public function createSecondLevelDownline($current_user)
    {
        if($current_user->ref_by){
            $user = User::where('ref_code', $current_user->ref_by)->first(); // Person who refer the current user
            if($user->ref_by){
                $second_level_ref = $user->ref_by;
                $second_level_user = User::where('ref_code', $second_level_ref)->first(); // Parent referer, the person that refer who refer

                $downline =  DownlineModel::where('user_id', $second_level_user->id)
                ->where('first_level_downline_id', $user->id)->first();

                $downline->update(['second_level_downline_id'=>$current_user->id]);
            }

        }

    }

    public function getDownlines($user)
    {
        $downlines = DownlineModel::where('user_id', $user->id)->get();

        $data = [];
        foreach ($downlines as $key => $downline) {
           $first_level = User::where('id', $downline['first_level_downline_id'])->first();
           $data[$key]['first_level_downline'] = $first_level;

           $data[$key]['second_level_downline'] = [];
           if($downline->second_level_downline_id){
             $second_level = User::where('id', $downline['second_level_downline_id'])->first();
             $data[$key]['second_level_downline'] = $second_level;
           }
        }

        return ($data);
    }     
}

?>