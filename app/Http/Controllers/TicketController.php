<?php

namespace App\Http\Controllers;

use App\Company;
use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;

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

        $company->tickets()->save($ticket) ;
        return json_encode($ticket);
    }
}
