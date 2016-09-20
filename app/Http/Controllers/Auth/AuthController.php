<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use App\Prof;
use App\Student;
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
        if(!isset($data['role']))
            return Validator::make($data, ['role' => 'required']);

        if($data['role'] == 'student') {
            $validator = Validator::make($data, [
                'name'      => 'required|max:255',
                'family'    => 'required|max:255',
                'dob'       => 'required|max:255',
                'memSince'  => 'required|max:255',
                'email'     => 'required|email|max:255|unique:users',
                'phoneNo'   => 'required|max:255',
                'password'  => 'required|min:6|confirmed',

                'stdID'     =>  'required|max:255',
                'field'     =>  'required|max:255',
            ]);
        }
        elseif($data['role']=='prof')
        {
            $validator = Validator::make($data,[
                'name'      =>  'required|max:255',
                'family'    =>  'required|max:255',
                'dob'       =>  'required|max:255',
                'memSince'  =>  'required|max:255',
                'email'     =>  'required|email|max:255|unique:users',
                'phoneNo'   =>  'required|max:255',
                'password'  =>  'required|min:6|confirmed',

                'edu'       =>  'required|max:255',
                'grade'     =>  'required|max:255',
            ]);
        }
        elseif($data['role']=='comp')
        {
            $validator = Validator::make($data,[
                'name'          =>  'required|max:255',
                'family'        =>  'required|max:255',
                'dob'           =>  'required|max:255',
                'memSince'      =>  'required|max:255',
                'email'         =>  'required|email|max:255|unique:users',
                'phoneNo'       =>  'required|max:255',
                'password'      =>  'required|min:6|confirmed',

                'company_name'  =>  'required|max:255',
                'business'      =>  'required|max:255',
                'description'   =>  'required',
                'address'       =>  'required|max:255',
            ]);
        }
        else
        {
            $validator = Validator::make($data, [
               'verification code'  =>  'required|max:255'
            ]);
        }

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'      => $data['name'],
            'family'    => $data['family'],
            'dob'       => $data['dob'],
            'memSince'  => $data['memSince'],
            'email'     => $data['email'],
            'phoneNo'   => $data['phoneNo'],
            'password'  => bcrypt($data['password']),
        ]);

        if($data['role'] == 'student') {
            $role = Student::create([
                'stdID'     =>  $data['stdID'],
                'field'     =>  $data['field'],
            ]);
        }
        elseif($data['role']=='prof')
        {
            $role = Prof::create([
                'edu'       =>  $data['edu'],
                'grade'     =>  $data['grade'],
            ]);
        }
        elseif ($data['role']=='comp')
        {
            $role = Company::create([
                'company_name'  =>  $data['company_name'],
                'business'      =>  $data['business'],
                'description'   =>  $data['description'],
                'address'       =>  $data['address'],
            ]);
        }

        $role->user()->save($user);
        return $user;
    }

    protected function authenticated()
    {
        $user = \Auth::user();
        $role = get_class($user->role()) ;
        if($role == Student::class)
            $url = "/students/home/" ;
        elseif($role == Prof::class)
            $url = "/faculty/home/" ;
        elseif($role == Company::class)
            $url = "/companies/home/" ;

        return redirect($url);
    }
}
