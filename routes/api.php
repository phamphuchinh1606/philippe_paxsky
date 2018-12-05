<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login','LoginController@login')->name('api.login');

//Api Customer
Route::get('/customer/info', 'CustomerController@info')->name('api.customer.info');
Route::post('/customer/create', 'CustomerController@create')->name('api.customer.create');

//Api building
Route::get('/building','BuildingController@list')->name('api.building');

//Api Office
Route::get('/office','OfficeController@listOffice')->name('api.building');

//Api Address
Route::get('/province','AddressController@provinceList')->name('api.address.province');
Route::get('/district','AddressController@districtList')->name('api.address.district');

//Api Direction
Route::get('/direction','DirectionController@directionList')->name('api.direction');
