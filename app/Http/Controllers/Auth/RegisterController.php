<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Downline;
use App\Helpers\Referer;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Traits\CustomRegistersUsers;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use CustomRegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::USERDASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['first_name'] = preg_replace('/[^A-Za-z]/', '', trim($data['first_name']));
        $data['last_name'] = preg_replace('/[^A-Za-z]/', '', trim($data['last_name']));
        if(empty($data['first_name']) || $data['first_name'] == '' || empty($data['last_name']) || $data['last_name'] == ''){
            session()->flash('error', 'Name field must not contain special characters');
        }

        return Validator::make($data, 
        [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', ],
            'password' => ['required', 'string', 'min:5', 'max:20',],
            'ref_by'=>['max:50'],
            'dob'=>'required|date|before:-18 years',
        ],
        [
            'required'=> 'Some required fields not filled',
            'unique'=>'Looks like this email has been used by some smart folk',
            'min'=>'Your password minimum length should be 5',
            'before'=>'Please wait until you are 18 years🤦‍♀️🤦‍♀️',
        
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $ref = new Referer;
        $code = $ref->AssignRefCodeToIndividual();

        $data['ref_code'] = $code;
        $data['ref_link'] = config('app.url').'/register?ref='.$code;
        $data['password'] = Hash::make($data['password']);

        // $identification = 'id-'.$data['email'].'.'.$data['identification']->extension();
        // $data['identification']->move(public_path('users/identification/'), $identification);
        // $data['identification'] = $identification;


        try{

             $user = User::create($data);

        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }

        if($user->ref_by !=null)
        {
            $downline = new Downline;
            $downline->createDownline($user);
        }

        return $user;
    }
}
