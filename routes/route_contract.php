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

//Route Office Layout
Route::get('/contract', 'ContractController@index')->name('contract.index');
Route::get('/contract/create', 'ContractController@showCreate')->name('contract.create');
Route::post('/contract/create', 'ContractController@create')->name('contract.create');
Route::get('/contract/update/{id}', 'ContractController@showUpdate')->name('contract.update');
Route::post('/contract/update/{id}', 'ContractController@update')->name('contract.update');
Route::post('/contract/delete/{id}', 'ContractController@destroy')->name('contract.delete');


