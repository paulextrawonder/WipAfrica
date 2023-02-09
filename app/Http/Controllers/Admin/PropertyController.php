<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GenerateRandomString;
use App\Helpers\Validation;
use App\Http\Controllers\Controller;
use App\Mail\NewProjectMail;
use App\Models\Property;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{

    public function property()
    {
        try{
            $properties = Property::where(['status'=>1, 'sold'=>0, 'verified'=>1])->orderBy('id', 'desc')->get();
        }catch(Exception $e){

            return back()->with('error', $e->getMessage());
        }

        return view('admin.project', compact('properties'));
    }

    public function createForm()
    {
        return view('admin.upload-project');
    }

    protected function uploadPath()
    {
        return 'properties/';
    }

    public function createProperty(Request $request)
    {
        $validation = new Validation;
        $data = $validation->addPropertyValidation($request);

        $data['user_id'] = auth()->guard('admin')->user()->id;

        $helper = new GenerateRandomString;
        $string = $helper->getString(10).'.'.Carbon::now()->format('ymshmssi');
      
       if(!empty($data['form']))
       {
          $data['form'] = 'form-'.$string.'.'.$data['form']->extension();
          $request['form']->move(public_path($this->uploadPath().'/form'), $data['form']);

       }
       if(!empty($data['brochure']))
       {
          $data['brochure'] = 'brochure-'.$string.'.'.$data['brochure']->extension();
          $request['brochure']->move(public_path($this->uploadPath().'/brochure'), $data['brochure']);
       }

       if(!empty($data['flier']))
       {
          $data['flier'] = 'flier-'.$string.'.'.$data['flier']->extension();
          $request['flier']->move(public_path($this->uploadPath().'/flier'), $data['flier']);
       }

       if(!empty($data['estate_logo']))
       {
          $data['estate_logo'] = 'logo-'.$string.'.'.$data['estate_logo']->extension();
          $request['estate_logo']->move(public_path($this->uploadPath().'/logo'), $data['estate_logo']);
       }

       if(!empty($data['image_1']))
       {
          $data['image_1'] = 'image_1-'.$string.'.'.$data['image_1']->extension();
          $request['image_1']->move(public_path($this->uploadPath().'/slider'), $data['image_1']);
       }

       if(!empty($data['image_2']))
       {
          $data['image_2'] = 'image_2-'.$string.'.'.$data['image_2']->extension();
          $request['image_2']->move(public_path($this->uploadPath().'/slider'), $data['image_2']);
       }

       if(!empty($data['image_3']))
       {
          $data['image_3'] = 'image_3-'.$string.'.'.$data['image_3']->extension();
          $request['image_3']->move(public_path($this->uploadPath().'/slider'), $data['image_3']);
       }

       if(!empty($data['image_4']))
       {
          $data['image_4'] = 'image_4-'.$string.'.'.$data['image_4']->extension();
          $request['image_4']->move(public_path($this->uploadPath().'/slider'), $data['image_4']);
       }

        $data['verified'] = 1;

       try{
        $created = Property::create($data);
       }
       catch(Exception $e){
        return back()->with('error', $e->getMessage());
       }

       $users = User::whereNotNull('email_verified_at')->where('is_active', true)->get();
       foreach ($users as $user) {
        Mail::to($user->email)->send(new NewProjectMail($user->first_name, $data));
       }

       return back()->with('success', $created['property_name'].' has been created successfully');
    }

    public function adminShowProperty(Property $property)
    {
        if($property->status = $property->verified == 0 || $property->sold == 1){
            return back()->with('error', 'This property is not available');
        }
       
        return view('admin.view-project', compact('property'));    
    
    }

    public function deleteProperty(Property $id)
    {
        try {
            $id->delete();
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }

        return back()->with('success', 'Project successfully removed');
    }

    public function updatePropertyForm(Property $id)
    {
        $property = $id;
        return view('admin.edit-project', compact('property'));
    }

    public function updateProperty(Request $request)
    {
        $validation = new Validation;
        $data = $validation->updatePropertyValidation($request);

        $helper = new GenerateRandomString;
        $string = $helper->getString(10).'.'.Carbon::now()->format('ymshmssi');

        if(!empty($data['form']))
        {
           $data['form'] = 'form-'.$string.'.'.$data['form']->extension();
           $request['form']->move(public_path($this->uploadPath().'/form'), $data['form']);
 
        }
        if(!empty($data['brochure']))
        {
           $data['brochure'] = 'brochure-'.$string.'.'.$data['brochure']->extension();
           $request['brochure']->move(public_path($this->uploadPath().'/brochure'), $data['brochure']);
        }
 
        if(!empty($data['flier']))
        {
           $data['flier'] = 'flier-'.$string.'.'.$data['flier']->extension();
           $request['flier']->move(public_path($this->uploadPath().'/flier'), $data['flier']);
        }
 
        if(!empty($data['estate_logo']))
        {
           $data['estate_logo'] = 'logo-'.$string.'.'.$data['estate_logo']->extension();
           $request['estate_logo']->move(public_path($this->uploadPath().'/logo'), $data['estate_logo']);
        }
 
        if(!empty($data['image_1']))
        {
           $data['image_1'] = 'image_1-'.$string.'.'.$data['image_1']->extension();
           $request['image_1']->move(public_path($this->uploadPath().'/slider'), $data['image_1']);
        }
 
        if(!empty($data['image_2']))
        {
           $data['image_2'] = 'image_2-'.$string.'.'.$data['image_2']->extension();
           $request['image_2']->move(public_path($this->uploadPath().'/slider'), $data['image_2']);
        }
 
        if(!empty($data['image_3']))
        {
           $data['image_3'] = 'image_3-'.$string.'.'.$data['image_3']->extension();
           $request['image_3']->move(public_path($this->uploadPath().'/slider'), $data['image_3']);
        }
 
        if(!empty($data['image_4']))
        {
           $data['image_4'] = 'image_4-'.$string.'.'.$data['image_4']->extension();
           $request['image_4']->move(public_path($this->uploadPath().'/slider'), $data['image_4']);
        }

        try {
            $property = Property::where('id', $data['id'])->first();
            $property->update($data); 
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }

        return redirect(route('adminShowProperty', ['property'=>$data['id']]))->with('success', $data['estate_name'].' Updated successfully');
    }

}
