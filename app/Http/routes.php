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

/*
* News
*/
Route::get('/vijesti', [
	'uses' => '\App\Http\Controllers\NewsController@index',
	'as' => 'news.index',
]);
Route::get('/vijest/nova', [
	'uses' => '\App\Http\Controllers\NewsController@getNewStory',
	'as' => 'news.new',
	'middleware' => ['auth'],
]);
Route::post('/vijest/nova', [
	'uses' => '\App\Http\Controllers\NewsController@postNewStory',
	'as' => 'news.new',
	'middleware' => ['auth'],
]);
Route::get('/vijest/{slug}', [
	'uses' => '\App\Http\Controllers\NewsController@getStory',
	'as' => 'news.story',
]);
Route::get('/vijest/{slug}/uredi', [
	'uses' => '\App\Http\Controllers\NewsController@getEdit',
	'as' => 'news.edit',
	'middleware' => ['auth'],
]);
Route::post('/vijest/{slug}/uredi', [
	'uses' => '\App\Http\Controllers\NewsController@postEdit',
	'as' => 'news.edit',
	'middleware' => ['auth'],
]);
Route::get('/vijest/{slug}/delete', [
	'uses' => '\App\Http\Controllers\NewsController@getDelete',
	'as' => 'news.delete',
	'middleware' => ['auth'],
]);

/*
* Projects
*/
Route::get('/projekti', [
	'uses' => '\App\Http\Controllers\ProjectsController@index',
	'as' => 'projects.index',
]);
Route::get('/projekt/novi', [
	'uses' => '\App\Http\Controllers\ProjectsController@getNewProject',
	'as' => 'projects.new',
	'middleware' => ['auth'],
]);
Route::post('/projekt/novi', [
	'uses' => '\App\Http\Controllers\ProjectsController@postNewProject',
	'as' => 'projects.new',
	'middleware' => ['auth'],
]);
Route::get('/projekt/{slug}', [
	'uses' => '\App\Http\Controllers\ProjectsController@getProject',
	'as' => 'projects.project',
]);
Route::get('/projekt/{slug}/uredi', [
	'uses' => '\App\Http\Controllers\ProjectsController@getEdit',
	'as' => 'projects.edit',
	'middleware' => ['auth'],
]);
Route::post('/projekt/{slug}/uredi', [
	'uses' => '\App\Http\Controllers\ProjectsController@postEdit',
	'as' => 'projects.edit',
	'middleware' => ['auth'],
]);
Route::get('/projekt/{slug}/delete', [
	'uses' => '\App\Http\Controllers\ProjectsController@getDelete',
	'as' => 'projects.delete',
	'middleware' => ['auth'],
]);

/*
* Gallery
*/
Route::get('/galerija', [
	'uses' => '\App\Http\Controllers\GalleryController@index',
	'as' => 'gallery.index',
]);
Route::post('/galerija', [
	'uses' => '\App\Http\Controllers\GalleryController@postNewAlbum',
	'as' => 'gallery.index',
	'middleware' => ['auth'],
]);
Route::get('/galerija/{id}', [
	'uses' => '\App\Http\Controllers\GalleryController@getAlbum',
	'as' => 'gallery.album',
]);
Route::post('/galerija/{id}/unos', [
	'uses' => '\App\Http\Controllers\GalleryController@postInsertImages',
	'as' => 'gallery.insert',
	'middleware' => ['auth'],
]);
Route::get('/galerija/{id}/delete', [
	'uses' => '\App\Http\Controllers\GalleryController@getDelete',
	'as' => 'gallery.delete',
	'middleware' => ['auth'],
]);

/*
* Pages
*/
Route::get('/vodstvo', [
	'uses' => '\App\Http\Controllers\HomeController@getVodstvo',
	'as' => 'pages.vodstvo'
]);
Route::get('/povijest', [
	'uses' => '\App\Http\Controllers\HomeController@getPovijest',
	'as' => 'pages.povijest'
]);
Route::get('/statut', [
	'uses' => '\App\Http\Controllers\HomeController@getStatut',
	'as' => 'pages.statut'
]);
Route::get('/kontakt', [
	'uses' => '\App\Http\Controllers\HomeController@getKontakt',
	'as' => 'pages.kontakt'
]);
Route::get('/partneri', [
	'uses' => '\App\Http\Controllers\HomeController@getPartners',
	'as' => 'pages.partners'
]);

/*
* Profile
*/
Route::get('/racun', [
	'uses' => '\App\Http\Controllers\ProfileController@index',
	'as' => 'profile.index',
	'middleware' => ['auth'],
]);
Route::get('/racun/uredi', [
	'uses' => '\App\Http\Controllers\ProfileController@getEdit',
	'as' => 'profile.edit',
	'middleware' => ['auth'],
]);
Route::post('/racun/uredi', [
	'uses' => '\App\Http\Controllers\ProfileController@postEdit',
	'as' => 'profile.edit',
	'middleware' => ['auth'],
]);
Route::get('/racun/promjena-lozinke', [
	'uses' => '\App\Http\Controllers\ProfileController@getChangepwd',
	'as' => 'profile.changepwd',
	'middleware' => ['auth'],
]);
Route::post('/racun/promjena-lozinke', [
	'uses' => '\App\Http\Controllers\ProfileController@postChangepwd',
	'as' => 'profile.changepwd',
	'middleware' => ['auth'],
]);

/*
* Admin
*/
Route::get('/admin', [
	'uses' => '\App\Http\Controllers\AdminController@index',
	'as' => 'admin.index',
	'middleware' => ['auth'],
]);
Route::get('/admin/novi-clan', [
	'uses' => '\App\Http\Controllers\AdminController@getNewMember',
	'as' => 'admin.newmember',
	'middleware' => ['auth'],
]);
Route::post('/admin/novi-clan', [
	'uses' => '\App\Http\Controllers\AdminController@postNewMember',
	'as' => 'admin.newmember',
	'middleware' => ['auth'],
]);
Route::get('/admin/clanovi/{order?}', [
	'uses' => '\App\Http\Controllers\AdminController@getMembers',
	'as' => 'admin.members',
	'middleware' => ['auth'],
]);
Route::get('/admin/deletemember/{id}', [
	'uses' => '\App\Http\Controllers\AdminController@getDeleteMember',
	'as' => 'admin.deletemember',
	'middleware' => ['auth'],
]);
Route::get('/admin/changeactive/{id}', [
	'uses' => '\App\Http\Controllers\AdminController@getChangeActive',
	'as' => 'admin.changeactive',
	'middleware' => ['auth'],
]);