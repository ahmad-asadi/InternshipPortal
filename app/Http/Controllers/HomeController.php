<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Company;
use App\Http\Requests;
use App\Prof;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     * @internal param User $user
     */
    public function index()
    {
        $user = \Auth::user();
        $role = get_class($user->role()) ;
        if($role == Student::class)
            $url = "/students/home/" ;
        elseif($role == Prof::class)
            $url = "/faculty/home/" ;
        elseif($role == Company::class)
            $url = "/companies/home" ;
        elseif($role == Admin::class)
            $url = "/admin/home" ;
        else
            dd($user);

        return redirect($url);
    }
}
