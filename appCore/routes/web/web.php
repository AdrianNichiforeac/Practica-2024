<?php

use Illuminate\Support\Facades\Auth;
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

//Language
// clear route cache
Route::get('/clear-route-cache', function () {
    Artisan::call('route:cache');
    return 'Routes cache has clear successfully !';
});

Route::get('/locale/{id}', 'FrontendController@language');

Route::get('/', 'HomeController@home')->name('home');

Route::get('/news', 'NewsController@news')->name('news');
Route::get('/news/{news}', 'NewsController@newsDetail')->name('newsDetail');

Route::get('/contacts', 'ContactController@contacts')->name('contacts');
Route::get('/send-mail', 'ContactController@sendEmail')->name('send-mail');
Route::post('/sendmail', 'ContactController@contactPost')->name('contactForm');

//Route::get('/driver_registration', 'DriverRegistrationController@index')->name('driverRegistration');
Route::post('/driver_registration', 'DriverRegistrationController@registrationPost')->name('driverRegistrationPost');

//Route::get('/operator_registration', 'OperatorRegistrationController@index')->name('operatorRegistration');
Route::post('/operator_registration', 'OperatorRegistrationController@registrationPost')->name('operatorRegistrationPost');
Route::post('/store_fisiere', 'OperatorRegistrationController@storeFisiere')->name('store_fisiere');

//Route::get('/manager_registration', 'ManagerRegistrationController@index')->name('managerRegistration');
Route::post('/manager_registration', 'ManagerRegistrationController@registrationPost')->name('managerRegistrationPost');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/admin', 'Admin\AdminController@index')->name('admin.home');
    Route::get('/admin', 'Admin\AdminController@index')->name('admin');
    Route::get('logout', 'Auth\LoginController@logout');
});

Route::get('/{linkName}', 'Page_fController@page')->name('page');

?>



