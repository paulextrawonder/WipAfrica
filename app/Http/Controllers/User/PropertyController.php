<?php

namespace App\Http\Controllers\User;

use App\Helpers\GenerateRandomString;
use App\Helpers\Validation;
use App\Http\Controllers\Controller;
use App\Models\Property;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function user()
    {
        return Auth::user();
    }

    public function createForm()
    {
        return view('user.upload-project');
    }
    protected function uploadPath()
    {
        return 'properties/';
    }

    public function createProperty(Request $request)
    {
        $validation = new Validation;
        $data = $validation->addPropertyValidation($request);

        $data['user_id'] = $this->user()->id;

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

    //    if(sizeof($data['flier']) < 2 || sizeof($data['flier']) > 2 )
    //    {
    //     return back()->with('error', 'File upload must not be more or less than 5 images');
    //    }

    //    foreach ($request['image'] as $index=>$img) 
    //    {
    //        $index ++;
    //        $data['image_'.$index] = 'image'.$index.'-for-'.$request['name'].'.'.$img->extension();
    //        $img->move(public_path($this->uploadPath().'/'), $data['image_'.$index]);
        
    //    }
       try{
        $created = Property::create($data);
       }
       catch(Exception $e){
        return back()->with('error', $e->getMessage());
       }

       return back()->with('success', $created['property_name'].' has been created successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allProperty()
    {
        try{
            $properties = Property::where(['status'=>1, 'sold'=>0, 'verified'=>1])->orderBy('id', 'desc')->get();
        }catch(Exception $e){

            return back()->with('error', $e->getMessage());
        }

        return view('user.project', compact('properties'));
    }


    public function showProperty(Property $property)
    {
        if($property->status = $property->verified == 0 || $property->sold == 1){
            return back()->with('error', 'This property is not available');
        }
       
        return view('user.single-project', compact('property'));    
    
    }

    public function getFavouriteProperty()
    {
        try {
            $favs = Property::join('favourite_properties', 'properties.id', 'favourite_properties.property_id')
            ->where('realtor_id', $this->user()->id)->get();

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        if($favs->count() == 0){
            return $this->sendError('error', ['error'=>'You have not added any property to favourite']);
        }

        $data['favourites'] = $favs; 
        $data['count'] = $favs->count();

        return $this->sendResponse($data, 'success');
    }

    // public function addPropertyToFavourite($property_id)
    // {
    //     if(FavouriteProperty::where(['property_id'=>$property_id, 'realtor_id'=>$this->user()->id])->count() > 0)
    //     {
    //         return $this->sendError('error', ['error'=>'Already in favourite']);
    //     }
    //     try{
    //     FavouriteProperty::create(['realtor_id'=>$this->user()->id, 'property_id'=>$property_id]);
    //     }
    //     catch(Exception $e){
    //         return back()->with('error', $e->getMessage());
    //     }

    //     return $this->sendResponse([], 'Added to favourite');
    // }

    // public function searchPropertyByName(Request $request)
    // {
    //     $validated = $request->validate([
    //         'search'=>['required', 'string'],
    //     ]);

    //     $search = $request['search'];        
    //     $property = Property::where(['status'=>true, 'verified'=>true, 'sold'=>false])
    //         ->where('name', 'LIKE', "%{$search}%")
    //         ->orWhere('category',  'LIKE',  "%{$search}%")
    //         ->orWhere('location',  'LIKE',  "%{$search}%")
    //         ->orWhere('amount',  'LIKE', "%{$search}%")
    //         ->get();

    //     if($property->isEmpty()){
    //         return $this->sendError('error', ['error'=>'Property not found']);
    //     }

    //     return $this->sendResponse($property, 'success');
    // }

    // public function removePropertyFromFavourite(FavouriteProperty $fav)
    // {
    //     if($fav->realtor_id != $this->user()->id || !$fav->delete())
    //     {
    //         return $this->sendError('error', ['error'=>'Operation failed']);
    //     }
        
    //     return $this->sendResponse([], 'Removed from favourite');

    // }
}
