<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\branch\Branch;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


// public function showRegistrationForm()
//     {
//         // dd('auth registrations');
       
//         return view('layouts-horizontal');
//     }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
   public function showRegistrationForm(){
       $branches=Branch::all();
       return view('auth.register',compact('branches'));
   }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            // 'dob' => ['required', 'date', 'before:today'],
            'avatar' => ['image' ,'mimes:jpg,jpeg,png','max:1024'],
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
        $data_reg=[
            'name' => $data['name'],
            'email' => $data['email'], 
            'role_id' => 1,
            'branch_id' => $data['branch_id'],
            'password' => Hash::make($data['password']),
            // 'dob' => date('Y-m-d', strtotime($data['dob'])),
            // 'avatar' => "/images/" . $avatarName,
        ];
        if (request()->has('avatar')) {            
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $data_reg['avatar']="/images/" . $avatarName;
        }
        
        return User::create($data_reg);
    }
}
