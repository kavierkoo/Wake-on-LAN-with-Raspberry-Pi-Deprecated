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

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

	// Auth Middleware
	Route::get('/', 'userController@index');
    Route::post('/', 'userController@wol');
	Route::get('/home', 'userController@toslash');
    Route::get('/logout', 'Auth\LoginController@logout');
	Route::get('/change_pw', 'userController@change_pw');
    Route::post('/change_pw', 'userController@store_change_pw');

	// Admin Middleware
    Route::get('/update_user', 'HomeController@update_user');
    Route::post('/update_user', 'HomeController@store_update_user');
    Route::get('/remove_user', 'HomeController@remove_user');
    Route::post('/remove_user', 'HomeController@store_remove_user');
    Route::get('/add_device', 'HomeController@add_device');
    Route::post('/add_device', 'HomeController@store_add_device');
    Route::get('/update_device', 'HomeController@update_device');
    Route::post('/update_device', 'HomeController@store_update_device');
	Route::get('/counter','HomeController@counter');
	Route::get('/setting', 'HomeController@setting');
	Route::post('/setting', 'HomeController@update_setting');
});



