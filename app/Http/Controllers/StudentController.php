<?php

namespace App\Http\Controllers;

use App\Prof;
use App\ProfTicket;
use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
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

        /** @noinspection PhpUndefinedMethodInspection */
        $profTickets = ProfTicket::get() ;

        /** @noinspection PhpUndefinedMethodInspection */
        $reservedTicket = $user->role()->ticket() ;
        /** @noinspection PhpUndefinedMethodInspection */
        $reservedProfTicket = $user->role()->profTicket() ;

        return view('students.home', ["user"=>$user, "profs"=>$profs, "tickets"=>$tickets, "reservedTicket"=>$reservedTicket, "profTickets" => $profTickets , "reservedProfTicket" => $reservedProfTicket]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
