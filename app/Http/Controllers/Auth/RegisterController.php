<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\userBasic;
use App\userProfilePic;
use App\verifyUser;
use App\verifyEmail;
use App\userDetails;
use App\Mail\emailConfirmation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
// use App\Mail\emailConfirmation;

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
    protected $redirectTo = '/home';

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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string','max:255', 'unique:user_basics'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'city'=>['required'],
            'state'=>['required'],
            'zipcode'=>['required','integer','min:4']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user =User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            
            'password' => Hash::make($data['password']),
        ]);

         
         userBasic::create([
            'user_id'=>$user->id,
            'city'=>$data['city'],
            'state'=>$data['state'],
            'username'=>$data['username'],
            'zipcode'=>$data['zipcode']

         ]);

         userDetails::create([
            'user_id'=>$user->id,
            

         ]);

         userProfilePic::create([
            'user_id'=>$user->id

         ]);

          $verifyUser = verifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
          ]);
          \Mail::to($user->email)->send(new emailConfirmation($user));


          return $user;

    }
}
