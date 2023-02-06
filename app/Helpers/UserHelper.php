<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserHelper
{
    public function imageCropper($request)
    {
        //dd($request->profile_pic);
        $folderPath = public_path('realtor_uploads/profile_pic/');
 
        $image_parts = explode(";base64,", $request->image);
        
        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[0];
        $image_base64 = base64_decode($image_parts[0]);
 
        $imageName ='profile_for-'.Auth::user()->email.'.png';

        $imageFullPath = $folderPath.$imageName;
 
        file_put_contents($imageFullPath, $image_base64);
 
        //  $saveFile = new User;
        //  $saveFile->profile_pic = $imageName;
        //  $saveFile->update();
    
        return $imageName;
         //return Redirect::back()->with('success', 'Profile updated successfully');
    }
}

?>