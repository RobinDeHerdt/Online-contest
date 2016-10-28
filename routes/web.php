<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::get('/deelnemen', 'DeelneemController@index')->middleware('auth');
Route::post('/deelnemen', 'DeelneemController@store')->middleware('auth');
Route::get('/wedstrijd', 'WedstrijdController@index');
Route::get('/winnaars' , 'WinnaarController@index');
Route::get('/getuservotes' , 'WedstrijdController@sendUserVotes');

Route::post('/wedstrijd' , 'WedstrijdController@store');
Route::post('/download' , 'WedstrijdController@download');