<?php

use App\Http\Controllers\TermsController;
use Illuminate\Support\Facades\Route;

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
Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->middleware('guest:admin')->name('admin.')->group(function () {
    Route::get('/login', 'LoginController@getLogin');
    Route::post('/login', 'LoginController@doLogin')->name('login');
});
Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('/index', 'LoginController@index')->name('index');
    Route::post('/logout', 'LoginController@logout')->name('logout');
    Route::resource('users', 'UsersController')->except('destroy');
    Route::post('/users/destroy', 'UsersController@destroy')->name('UserDestroy');
    Route::resource('work-method', 'WorkMethodController')->except('destroy');
    Route::post('/work-method/destroy', 'WorkMethodController@destroy')->name('WorkDestroy');
    Route::resource('terms', 'TermsController')->except('destroy');
    Route::post('/terms/destroy', 'TermsController@destroy')->name('TermDestroy');
    Route::resource('/popular', 'PopQuestionsController')->except('destroy');
    Route::post('/popular/destroy', 'PopQuestionsController@destroy')->name('PopularDestroy');
    Route::resource('/help', 'HelpController')->except('update');
    Route::post('/help/update', 'HelpController@update')->name('HelpReplay');
    Route::resource('driver', 'DriverController');
    Route::resource('car', 'CarsController');
    Route::resource('cartypes', 'CarTypesController');
    Route::post('/cartypes/destroy', 'CarTypesController@destroy')->name('CarTypeDestroy');
    Route::get('/about', 'TermsController@about')->name('about');
    Route::post('/saveAbout', 'TermsController@saveAbout')->name('saveAbout');
    Route::resource('order', 'OrdersController');
    Route::get('orders-report', 'ReportsController@orders_report')->name('OrdersReports');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
