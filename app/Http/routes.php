<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'uses' => '\App\Http\Controllers\HomeController@index',
	'as' => 'home',
]);

/*
* Auth
*/
Route::get('/prijava', [
	'uses' => '\App\Http\Controllers\AuthController@getLogin',
	'as' => 'auth.login',
	'middleware' => ['guest'],
]);
Route::post('/prijava', [
	'uses' => '\App\Http\Controllers\AuthController@postLogin',
	'as' => 'auth.login',
	'middleware' => ['guest'],
]);
Route::get('/odjava', [
	'uses' => '\App\Http\Controllers\AuthController@getLogout',
	'as' => 'auth.logout',
]);