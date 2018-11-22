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

//Route Building Type
Route::get('/building-type', 'BuildingTypeController@index')->name('building_type.index');
Route::get('/building-type/create', 'BuildingTypeController@showCreate')->name('building_type.create');
Route::post('/building-type/create', 'BuildingTypeController@create')->name('building_type.create');
Route::get('/building-type/update/{id}', 'BuildingTypeController@showUpdate')->name('building_type.update');
Route::post('/building-type/update/{id}', 'BuildingTypeController@update')->name('building_type.update');
Route::post('/building-type/delete/{id}', 'BuildingTypeController@destroy')->name('building_type.delete');

//Route Investors
Route::get('/investor', 'InvestorController@index')->name('investor.index');
Route::get('/investor/create', 'InvestorController@showCreate')->name('investor.create');
Route::post('/investor/create', 'InvestorController@create')->name('investor.create');
Route::get('/investor/update/{id}', 'InvestorController@showUpdate')->name('investor.update');
Route::post('/investor/update/{id}', 'InvestorController@update')->name('investor.update');
Route::post('/investor/delete/{id}', 'InvestorController@destroy')->name('investor.delete');
