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

//Route Classification
Route::get('/classify', 'ClassificationController@index')->name('classify.index');
Route::get('/classify/create', 'ClassificationController@showCreate')->name('classify.create');
Route::post('/classify/create', 'ClassificationController@create')->name('classify.create');
Route::get('/classify/update/{id}', 'ClassificationController@showUpdate')->name('classify.update');
Route::post('/classify/update/{id}', 'ClassificationController@update')->name('classify.update');
Route::post('/classify/delete/{id}', 'ClassificationController@destroy')->name('classify.delete');

//Route Management Agency
Route::get('/management-agency', 'ManagementAgencyController@index')->name('management_agency.index');
Route::get('/management-agency/create', 'ManagementAgencyController@showCreate')->name('management_agency.create');
Route::post('/management-agency/create', 'ManagementAgencyController@create')->name('management_agency.create');
Route::get('/management-agency/update/{id}', 'ManagementAgencyController@showUpdate')->name('management_agency.update');
Route::post('/management-agency/update/{id}', 'ManagementAgencyController@update')->name('management_agency.update');
Route::post('/management-agency/delete/{id}', 'ManagementAgencyController@destroy')->name('management_agency.delete');

//Route Direction
Route::get('/direction', 'DirectionController@index')->name('direction.index');
Route::get('/direction/create', 'DirectionController@showCreate')->name('direction.create');
Route::post('/direction/create', 'DirectionController@create')->name('direction.create');
Route::get('/direction/update/{id}', 'DirectionController@showUpdate')->name('direction.update');
Route::post('/direction/update/{id}', 'DirectionController@update')->name('direction.update');
Route::post('/direction/delete/{id}', 'DirectionController@destroy')->name('direction.delete');
