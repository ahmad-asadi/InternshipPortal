<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getRegisterForm()
    {
        return view('tickets.register');
    }

    public function registerTicket(Request $request)
    {
        $user = \Auth::user();
        $company = $user->role() ;
        if(!is_a($company, '\App\Company'))
            dd($company);

        $ticket = new Ticket();
        $ticket->description    =   $request->input('description');
        $ticket->capacity       =   $request->input('capacity');

        /** @noinspection PhpUndefinedMethodInspection */
        $company->tickets()->save($ticket) ;
        return redirect('/companies/home');
    }

    public function reserveTicket($ticket){
        $user = \Auth::user();
        $student = $user->role() ;
        if(! is_a($student, '\App\Student'))
            dd($student);

        if(!isset($ticket) || !$ticket)
            dd('No Ticket');


        if(count($ticket->students()->get()) < $ticket->capacity) {
            /** @noinspection PhpUndefinedMethodInspection */
            $ticket->students()->save($student);
            $res = redirect('/students/home');
        }
        else
            $res = view('errors.503') ;

        return $res;
    }
}
