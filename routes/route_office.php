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
Route::get('/office-layout', 'OfficeLayoutController@index')->name('office_layout.index');
Route::get('/office-layout/create', 'OfficeLayoutController@showCreate')->name('office_layout.create');
Route::post('/office-layout/create', 'OfficeLayoutController@create')->name('office_layout.create');
Route::get('/office-layout/update/{id}', 'OfficeLayoutController@showUpdate')->name('office_layout.update');
Route::post('/office-layout/update/{id}', 'OfficeLayoutController@update')->name('office_layout.update');
Route::post('/office-layout/delete/{id}', 'OfficeLayoutController@destroy')->name('office_layout.delete');

Route::post('office-layout/json/office','OfficeLayoutController@officeLayoutToJson')->name('office_layout.json.office');
//Route::post('/office-layout/image/add/{buildingId}','OfficeLayoutController@addBuildingImage')->name('office_layout.image.add');
//Route::post('/office-layout/image/delete/{buildingId}/{id}','OfficeLayoutController@deleteBuildingImage')->name('office_layout.image.delete');

//Route Office
Route::get('/office', 'OfficeController@index')->name('office.index');
Route::get('/office/create', 'OfficeController@showCreate')->name('office.create');
Route::post('/office/create', 'OfficeController@create')->name('office.create');
Route::get('/office/update/{id}', 'OfficeController@showUpdate')->name('office.update');
Route::post('/office/update/{id}', 'OfficeController@update')->name('office.update');
Route::post('/office/delete/{id}', 'OfficeController@destroy')->name('office.delete');

Route::get('/office/search','OfficeController@searchOffice')->name('office.search');


