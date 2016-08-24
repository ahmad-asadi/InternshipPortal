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


Route::auth();

Route::get('/', 'HomeController@index');

Route::get('/students/home', 'StudentController@index');

Route::get('/faculty/home', 'ProfController@index');
Route::get('/faculty/register', 'ProfRegisterController@getRegisterForm');