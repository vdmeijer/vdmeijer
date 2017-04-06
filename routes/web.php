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

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect'],
    ],
    function () {
        //Auth Routing Functionalities
        Auth::routes();

        //User has to be loged in to use these routes || be redirected to the login page
        Route::group(['middleware' => 'auth'], function () {
            // Dashboard
            Route::get('/home', 'HomeController@index');

        });

    });
