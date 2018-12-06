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

//Route User
Route::get('/appointment', 'AppointmentController@index')->name('appointment.index');
Route::get('/appointment/create', 'AppointmentController@showCreate')->name('appointment.create');
Route::post('/appointment/create', 'AppointmentController@create')->name('appointment.create');
Route::get('/appointment/update', 'AppointmentController@showUpdate')->name('appointment.update');
Route::post('/appointment/update', 'AppointmentController@update')->name('appointment.update');
Route::post('/appointment/delete', 'AppointmentController@destroy')->name('appointment.delete');


