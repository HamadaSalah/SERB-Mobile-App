<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('verfication-code', 'AuthController@VerficationCode');
    Route::post('send-code-reset-pass', 'AuthController@SendCodeReset');
    Route::post('reset-pass', 'AuthController@resetPassword');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    

});
Route::group(['middleware' => 'api'], function () {
    Route::get('allcars', 'CarsController@index');
    Route::get('onlycar/{id}', 'CarsController@show');
    Route::post('add-order', 'OrdersController@store');
    Route::post('get-my-orders/{id}', 'OrdersController@show');
    Route::post('add-payment-method', 'PaymentMethodController@store');
    Route::get('wallet-balance/{id}', 'PaymentMethodController@showBalance');
    route::get('work-method', 'PaymentMethodController@workMethod');
    route::get('terms', 'PaymentMethodController@terms');
    route::get('popular-quest', 'PaymentMethodController@popularQuest');
    route::get('about-us', 'PaymentMethodController@AboutUs');
    route::post('help/{id}', 'PaymentMethodController@help');
    route::post('contact-us/{id}', 'PaymentMethodController@contactUs');
    route::post('editProfile/{id}', 'AuthController@EditProfile');
});

//Driver Routes

Route::group(['prefix' => 'auth/driver'], function ($router) {
    Route::post('login', 'Driver\AuthController@login');
    Route::post('register', 'Driver\AuthController@register');
    Route::post('reset-pass', 'Driver\AuthController@resetPassword');
    Route::post('verfication-code', 'Driver\AuthController@VerficationCode');
    Route::post('send-code-reset-pass', 'Driver\AuthController@SendCodeReset');
    Route::post('EditProfile/{id}', 'Driver\AuthController@EditProfile');
    Route::post('logout', 'Driver\AuthController@logout');
    Route::post('refresh', 'Driver\AuthController@refresh');
    Route::post('me', 'Driver\AuthController@me');
});
Route::group(['middleware' => 'api', 'prefix' => 'auth/driver'], function () {
    Route::get('allorders', 'Driver\OrdersController@index');
    Route::get('order/{id}', 'Driver\OrdersController@show');
    Route::post('uploadDocs/{id}', 'Driver\DriverController@UploadDocs');
    Route::post('addCarDriver/{id}', 'Driver\DriverController@addCarDriver');
    Route::post('addCarCompany/{id}', 'Driver\DriverController@addCarCompany');
    Route::get('allcars/{id}', 'Driver\DriverController@allCars');
    Route::post('addNewOrder', 'Driver\OffersController@create');
    Route::get('getAllOffers/{id}', 'Driver\OffersController@show');
    Route::get('AcceptOffer/{id}', 'Driver\OffersController@AcceptOffer');
    Route::get('openChatWithDriver/', 'Driver\OffersController@openChatWithDriver');
    Route::get('getAllChatRooms/{id}', 'Driver\OffersController@getAllChatRooms');
});
