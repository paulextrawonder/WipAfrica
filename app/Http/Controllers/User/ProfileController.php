<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Validation;
use App\Models\NextOfKin;
use App\Traits\AuthenticatesUsers;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->validation = new Validation;
    }
    public function getProfile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function saveProfile(Request $request)
    {
        $data = $this->validation->validateIndividualProfileData($request);

        try{

            User::where('id', Auth::id())->update($data);

            return back()->with('success', 'profile updated successfully');

        }
        catch(Exception $e){
            return back()->with('error', 'Unable to update profile');
        }
        
    }

    public function changeProfilePic(Request $request, User $user)
    {

        $this->validation->profilePic($request);

        try{

            $profile_pic = 'profile_for-'.Auth::user()->email.'.'.$request->profile_pic->extension();
            $request['profile_pic']->move(public_path('users/profile_pic/'), $profile_pic);

            $data = $request['profile_pic'] = $profile_pic;
            $user->where('id', Auth::user()->id)->update(['profile_pic'=>$data]);

        }catch(Exception $e){
            return back()->with('error', 'Error occured');
        }
        
        return back()->with('success', 'Profile updated successfully');
    }

    public function getAccountDetails()
    {
        $account = User::select(
            'profile_pic',
            'bank_account_no',
            'bank_name',
            'bank_beneficiary_name'
        )->find(Auth::id());

        return view('user.account-details', compact('account'));
    }

    public function updateAccountDetails(Request $request, User $user)
    {
        $data = $this->validation->accountDetails($request);

        try {
            $user->find(Auth::id())->update($data);
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
        return back()->with('success', 'Account details updated successfully');
    }

    public function getNextOfKin()
    {
        try {
            $kin = NextOfKin::where('user_id', Auth::id())->first();
         } catch (Exception $e) {
             return back()->with('error','Error occured while fetching data');
         }
        return view('user.next-of-kin', compact('kin'));
    }

    public function updateNextOfKin(Request $request)
    {
        $data =  $this->validation->nextOfKin($request);

        try {
            NextOfKin::updateOrCreate(['user_id'=>Auth::id()], $data);
        } catch (Exception $e) {
            return back()->with('error', 'Unable to create your data');
        }

        return back()->with('success', 'Next of kin updated successfully');

    }

    public function changePasswordForm()
    {
        return view('user.account-password');
    }

    public function changePassword(Request $request, User $user)
    {
        $data = $this->validation->changePassword($request);

        if (!Hash::check($data['current_password'], Auth::user()->password)) {
            return back()->with('error', 'Invalid Creds!');
        }
        if (Hash::check($data['password'], Auth::user()->password)) {
          return back()->with('warning', 'You cannot repeat old passwords');
        }
        
        $password = Hash::make($data['password']);

        $user->find(Auth::id())->update(['password'=>$password]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return back()->with('success', 'Password changed successfully');

    }
}
