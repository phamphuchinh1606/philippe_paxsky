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
Route::get('/user', 'UserController@index')->name('user.index');
Route::get('/user/create', 'UserController@showCreate')->name('user.create');
Route::post('/user/create', 'UserController@create')->name('user.create');
Route::get('/user/update/{id}', 'UserController@showUpdate')->name('user.update');
Route::post('/user/update/{id}', 'UserController@update')->name('user.update');
Route::post('/user/delete/{id}', 'UserController@destroy')->name('user.delete');

//Route Customer
Route::get('/customer', 'CustomerController@index')->name('customer.index');
Route::get('/customer/create', 'CustomerController@showCreate')->name('customer.create');
Route::post('/customer/create', 'CustomerController@create')->name('customer.create');
Route::get('/customer/update/{id}', 'CustomerController@showUpdate')->name('customer.update');
Route::post('/customer/update/{id}', 'CustomerController@update')->name('customer.update');
Route::post('/customer/delete/{id}', 'CustomerController@destroy')->name('customer.delete');

Route::get('/customer/search','CustomerController@searchCustomer')->name('customer.search');




