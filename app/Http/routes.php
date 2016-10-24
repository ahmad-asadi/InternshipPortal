<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::bind("user", function($userId){
    return \App\User::find($userId) ;
});

Route::bind("ticketId", function($ticketId){
    return \App\Ticket::find($ticketId);
});

Route::bind("profTicketId", function($ticketId){
    return \App\ProfTicket::find($ticketId);
});


Route::auth();

Route::get('/', 'HomeController@index');

Route::get('/students/home', 'StudentController@index');
Route::get('/students/reserveTicket/{ticketId}', 'TicketController@reserveTicket');
Route::get('/students/reserveProfTicket/{profTicketId}', 'TicketController@reserveProfTicket');

Route::get('/faculty/home', 'ProfController@index');
Route::get('/faculty/register', 'ProfRegisterController@getRegisterForm');

Route::get('/faculty/registerTicket','TicketController@getProfTicketRegisterForm');
Route::post('/faculty/registerTicket','TicketController@registerProfTicket');

Route::get('/companies/home', 'CompanyController@index');
Route::get('/companies/register', 'CompanyRegisterController@getRegisterForm');

Route::get('/companies/registerTicket','TicketController@getRegisterForm');
Route::post('/companies/registerTicket','TicketController@registerTicket');
