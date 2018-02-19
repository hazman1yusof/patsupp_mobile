<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "TicketController@index")->name('home');

Route::get('/login', 'SessionController@index')->name('login');

Route::post('/login', 'SessionController@login');

Route::get('/signup', 'SessionController@show_signup');

Route::post('/signup', 'SessionController@signup');

Route::get('/logout','SessionController@destroy');

Route::get('/dashboard', "DashboardController@index")->name('dashboard');

Route::get('/customer', "CustomerController@index");

Route::post('/customer', "CustomerController@store");

Route::put('/customer/{user}', "CustomerController@update");

Route::delete('/customer/{user}', "CustomerController@destroy");

Route::get('/agent', "AgentController@index");

Route::post('/agent', "AgentController@store");

Route::put('/agent/{user}', "AgentController@update");

Route::delete('/agent/{user}', "AgentController@destroy");

Route::get('/settings', "SettingsController@index");

Route::get('/settings/change_password', "SettingsController@change_password");

Route::put('/settings/change_password/{user}', "SettingsController@update");

Route::post('/message', "MessageController@store");

Route::put('/message/{message}', "MessageController@update");

Route::get('/ticket/answer', "TicketController@answer");

Route::get('/ticket/create', "TicketController@create");

Route::post('/ticket/create', "TicketController@store");

Route::get('/ticket/{ticket}', "TicketController@show");

Route::get('/ticket', "TicketController@index")->name('ticket');

Route::post('/ticket', "TicketController@store");

Route::put('/ticket/{ticket}', "TicketController@update");