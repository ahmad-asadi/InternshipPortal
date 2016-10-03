<?php

namespace App\Http\Controllers;

use App\Prof;
use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;

class CompanyController extends Controller
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
        if(!\Auth::check())
            return redirect('/login');

        $user = \Auth::user();

        /** @noinspection PhpUndefinedMethodInspection */
        $profs = Prof::get() ;

        /** @noinspection PhpUndefinedMethodInspection */
        $tickets = Ticket::get() ;
        return view('comps.home', ["user"=>$user, "profs"=>$profs, "tickets"=>$tickets]);
    }
}
