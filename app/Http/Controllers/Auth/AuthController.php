<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name'  =>  'required|max:255',
            'family'  =>  'required|max:255',
            'stdID' => 'required|max:255|unique:users',
            'memSince'  =>  'required|max:255',
            'dob'  =>  'required|max:255',
            'field'  =>  'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phoneNo'  =>  'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'family' => $data['family'],
            'stdID' => $data['stdID'],
            'memSince' => $data['memSince'],
            'dob' => $data['dob'],
            'field' => $data['field'],
            'email' => $data['email'],
            'phoneNo' => $data['phoneNo'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
