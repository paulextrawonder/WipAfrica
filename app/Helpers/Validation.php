<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Validator;
class Validation
{

    public function validateIndividualProfileData($data)
    {
       $data = $data->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'state_of_residence'=>'required',
            'state_of_origin'=>'required',
            'nationality'=>'required',
        ]);

        return $data;
    }

    public function validateGroupProfileData($data)
    {
       $data = $data->validate([
            'realtor_type'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'bio'=>'',
            'group_name'=>'required',
            'group_official_email'=>'required',
            'group_phone'=>'required',
            'group_address'=>'required',
            'group_website'=>''
        ]);

        return $data;
    }

    public function profilePic($data)
    {
        $data = $data->validate([
            'profile_pic'=>'required|mimes:jpeg,jpg,png|max:1024'
            ]);

        return $data;
    }

    public function nextOfKin($data)
    {
        $validated = $data->validate(
        [
            'first_name'=>['required'],
            'middle_name'=>['required'],
            'last_name'=>['required'],
            'relationship'=>['required', 'string'],
            'email'=>['required', 'email'],
            'phone'=>['required', 'min:11', 'max:13'],
            'dob'=>['required', 'date', 'before:-18 years'],
            'gender'=>['required'], 
            'address'=>['required'],                        
        ], [
            'dob.before' => 'Next of kin must be older than 18 years'
        ]);    
        
        return $validated;
    }

    public function accountDetails($data)
    {
        $data = $data->validate([
            'bank_account_no'=>'required|max:10',
            'bank_name'=>'required',
            'bank_beneficiary_name'=>'required',          
        ]);
        
        return $data;
    }

    public function changePassword($data)
    {
        $validated = $data->validate(
        [
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:5'],
          ]);

          return $validated;
    }

    public function addPropertyValidation($data)
    {

        // if(sizeof($data['flier']) < 2 || sizeof($data['flier']) > 2 )
        // {
        //  return redirect()->back()->with('error', 'File upload must not be more or less than 5 images');
        // }

        $validated = $data->validate([
            'property_name'=>['required', 'unique:properties'],
            'estate_name'=>['required'],
            'estate_logo'=>['required'],
            'amount'=>['required'],
            'down_payment'=>['required'],
            'commission'=>['required'],
            'interest_free_months'=>['required'],
            'location'=>['required'],
            'property_type'=>['required'],
            'description'=>['required'],
            'image_1'=>['required', 'mimes:jpg,jpeg,png', 'max:2074'],
            'image_2'=>['required', 'mimes:jpg,jpeg,png', 'max:2074'],
            'image_3'=>['required', 'mimes:jpg,jpeg,png', 'max:2074'],
            'image_4'=>['required', 'mimes:jpg,jpeg,png', 'max:2074'],
            'form'=>['mimes:jpg,jpeg,png,pdf','max:2074'],
            'flier'=>['mimes:jpg,jpeg,png,pdf','max:2074'],
             
            'brochure'=>['mimes:jpg,jpeg,png,pdf'],
            'promo_price'=>[''],
        ],
        [
            'property_name.unique'=>'Opps, looks like this property name already exist'
        ]);

        return $validated;
    }

    public function updatePropertyValidation($data)
    {
        $validated = $data->validate([
            'id'=>['required'],
            'property_name'=>['required'],
            'estate_name'=>['required'],
            'estate_logo'=>['mimes:jpg,jpeg,png', 'max:2074'],
            'amount'=>['required'],
            'down_payment'=>['required'],
            'commission'=>['required'],
            'interest_free_months'=>['required'],
            'location'=>['required'],
            'property_type'=>['required'],
            'description'=>['required'],
            'image_1'=>['mimes:jpg,jpeg,png', 'max:2074'],
            'image_2'=>['mimes:jpg,jpeg,png', 'max:2074'],
            'image_3'=>['mimes:jpg,jpeg,png', 'max:2074'],
            'image_4'=>['mimes:jpg,jpeg,png', 'max:2074'],
            'form'=>['mimes:jpg,jpeg,png,pdf','max:2074'],
            'flier'=>['mimes:jpg,jpeg,png,pdf','max:2074'],
             
            'brochure'=>['mimes:jpg,jpeg,png,pdf'],
            'promo_price'=>[''],
        ],
        [
            'property_name.unique'=>'Opps, looks like this property name already exist'
        ]);

        return $validated;
    }

    public function addSales($data)
    {
        $validated = $data->validate([
            'property_id'=>'required',
            'no_of_unit'=>'required',
            'total_price'=>'required',
            'amount_paid'=>'required',
            'client_full_name'=>'required',
            'client_email'=>'required',
            'client_gender'=>'required',
            'client_phone'=>'required',
            'client_form'=>'required',
            'payment_proof'=>'required',
        ]);

        return $validated;
    }

    public function addPaymentToSales($data)
    {
        return $data->validate([
            'sales_id'=>'required',
            'added_amount'=>'required',
            'payment_proof'=>'required|mimes:jpeg,jpg,png,pdf|max:2048'
        ]);
    }

    public function createSupportTicket($data)
    {
        return $data->validate([
            'message'=>['required'],
            'subject'=>['required', 'string'], 
            'attachment'=>['mimes:jpg,jpeg,png', 'max:1024']
        ]);
    }
}

?>