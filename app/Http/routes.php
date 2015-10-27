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

//TE: Why do these routes look so messy? I'm trying to use permalinks,
//so the route list is fairly messy but the urls are pretty. Sorry about that.
//It might be wise to remove the "Route::resource" commands at some point, but
//I don't think they're harmful due to protecting middleware.

Route::get('/', 'WorksController@index');
Route::post('/works/{works}/restore', 'WorksController@restore');
Route::get('/ms', 'WorksController@middleSchool');
Route::get('/recent', 'WorksController@recentWorks');
Route::get('/scoreonly', 'WorksController@scoreOnly');
Route::get('/checkedout', 'WorksController@checkedOut');
Route::get('/deleted', 'WorksController@deleted');
Route::get('/mb', 'WorksController@marchingBand');
Route::get('/create', 'WorksController@create');
Route::resource('/works', 'WorksController');
Route::resource('/users', 'UsersController');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
