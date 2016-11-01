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



Auth::routes();

// Public routes
Route::get('/', 'HomeController@index');
Route::get('/wedstrijd', 'WedstrijdController@index');
Route::get('/api/getuservotes' , 'WedstrijdController@sendUserVotes');

// Auth routes
Route::get('/deelnemen', 'DeelneemController@index')->middleware('auth');
Route::post('/deelnemen', 'DeelneemController@store')->middleware('auth');
Route::post('/wedstrijd' , 'WedstrijdController@store');
Route::post('/download' , 'WedstrijdController@download');

// Admin routes
Route::get('/administrator' , 'AdminController@index')->middleware('admin');
Route::get('/administrator/wedstrijdfotos' , 'WedstrijdfotoController@index')->middleware('admin');
Route::get('/administrator/wedstrijdfotos/create' , 'WedstrijdfotoController@create')->middleware('admin');

Route::post('/administrator/destroy/{id}', 'AdminController@destroy');
Route::post('/administrator/restore/{id}', 'AdminController@restore');
Route::post('/administrator/wedstrijdfotos/create' , 'WedstrijdfotoController@store')->middleware('admin');
Route::post('/administrator/wedstrijdfotos/destroy/{id}' , 'WedstrijdfotoController@destroy')->middleware('admin');