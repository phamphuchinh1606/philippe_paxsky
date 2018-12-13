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
Route::get('/news', 'NewsController@index')->name('news.index');
Route::get('/news/create', 'NewsController@showCreate')->name('news.create');
Route::post('/news/create', 'NewsController@create')->name('news.create');
Route::get('/news/update', 'NewsController@showUpdate')->name('news.update');
Route::post('/news/update', 'NewsController@update')->name('news.update');
Route::post('/news/delete', 'NewsController@destroy')->name('news.delete');


