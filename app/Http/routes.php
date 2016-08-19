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


Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home/{user}', 'HomeController@index');
