<?php

namespace App\Http\Controllers;

use App\Company;
use App\Prof;
use App\ProfTicket;
use App\Student;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if(!\Auth::check())
//            return redirect('/login');

        /** @noinspection PhpUndefinedMethodInspection */
        $students = Student::get();

        /** @noinspection PhpUndefinedMethodInspection */
        $profs = Prof::get() ;

        /** @noinspection PhpUndefinedMethodInspection */
        $comps = Company::get() ;

        /** @noinspection PhpUndefinedMethodInspection */
        $profTickets = ProfTicket::get() ;

        /** @noinspection PhpUndefinedMethodInspection */
        $compTickets = Ticket::get() ;


        return view('admin.home', ["students"=>$students, "profs"=>$profs, "comps"=>$comps
            , "profTickets"=>$profTickets, "compTickets" => $compTickets]);
    }

    public function registerNewUser(Request $request)
    {
        $data = $request->input() ;
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
                'link'          =>  $data['link'],
            ]);
        }

        $role->user()->save($user);
        return redirect('/admin/home');

    }

}
