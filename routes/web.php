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

Route::get('/', "TicketController@index");

Route::get('/dashboard', "DashboardController@index");

Route::get('/ticket', "TicketController@index");

Route::get('/ticket/{id}', "TicketController@show");

Route::get('/customer', "CustomerController@index");

Route::get('/agent', "AgentController@index");

Route::get('/settings', "DashboardController@index");