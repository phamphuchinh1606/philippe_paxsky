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
Route::post('/customer/update-profile-image', 'CustomerController@updateProfileImage')->name('api.customer.update.profile_image');
Route::post('/customer/update-email', 'CustomerController@updateEmail')->name('api.customer.update.email');
Route::post('/customer/update-mobile-phone', 'CustomerController@updateMobilePhone')->name('api.customer.update.mobile_phone');
Route::post('/customer/update-password', 'CustomerController@updatePassword')->name('api.customer.update.password');
Route::post('/customer/update', 'CustomerController@update')->name('api.customer.update');
Route::get('/customer/facebook/check-token', 'CustomerController@checkTokenFacebook')->name('api.customer.facebook.check_token');
Route::get('/customer/facebook-account-kit/check-token', 'CustomerController@checkTokenMobilePhone')->name('api.customer.facebook_account_kit');
Route::post('/customer/social/create-login', 'CustomerController@createLoginSocial')->name('api.customer.social.create_login');

//Api building
Route::get('/building','BuildingController@list')->name('api.building');
Route::get('/building/detail','BuildingController@detail')->name('api.building.detail');
Route::get('/building/image-first','BuildingController@imageFirst')->name('api.building.image_first');

//Api Office
Route::get('/office','OfficeController@listOffice')->name('api.building');

//Api Address
Route::get('/province','AddressController@provinceList')->name('api.address.province');
Route::get('/district','AddressController@districtList')->name('api.address.district');

//Api Direction
Route::get('/direction','DirectionController@directionList')->name('api.direction');

//Api Appointment
Route::post('/appointment/create','AppointmentController@create')->name('api.appointment.create');
Route::post('/appointment/update','AppointmentController@update')->name('api.appointment.update');
Route::post('/appointment/delete','AppointmentController@delete')->name('api.appointment.delete');
Route::get('/appointment/list','AppointmentController@appointmentList')->name('api.appointment.rating');
Route::get('/appointment/last-done-not-rating','AppointmentController@appointmentLastDoneNotRating')->name('api.appointment.done_not_rating');
Route::post('/appointment/update-flg-skip','AppointmentController@updateFlgSkip')->name('api.appointment.update_flg_skip');
Route::post('/appointment/rating','AppointmentController@ratingVisit')->name('api.appointment.rating');

//Batch Route
Route::post('/batch/building-thumbnail', 'BatchController@buildThumbnailBuilding');
Route::post('/batch/office-thumbnail', 'BatchController@buildThumbnailOffice');

//Api News
Route::get('/news/list','NewsController@newsList')->name('api.news');

//Api Notification
Route::post('/notification/create-token','NotificationController@createRequestToken')->name('api.notification.create_token');
Route::post('/notification/push-notification','NotificationController@pushNotification')->name('api.notification.push_notification');
Route::post('/notification/update-read-notification','NotificationController@readNotification')->name('api.notification.read_notification');
Route::post('/notification/delete','NotificationController@deleteNotification')->name('api.notification.delete');
Route::get('/notification/count','NotificationController@countNotificationUnRead')->name('api.notification.count');
Route::get('/notification/notifications','NotificationController@listNotification')->name('api.notification.list');
