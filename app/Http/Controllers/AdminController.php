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

}
