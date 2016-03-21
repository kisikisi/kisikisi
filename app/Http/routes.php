<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group([
    'domain' => 'admin.' . env('APP_DOMAIN')
], function() {
	Route::get('/', function () {
	    return view('admin');
	});	
	Route::get('{state}', function () {
	    return view('admin');
	});
});

Route::group([
    'domain' => 'api.' . env('APP_DOMAIN')
], function() {
	Route::get('/login', 'Auth\AuthControllers@login');

	//module school type
	Route::get('school/type', 'SchoolTypeController@index');
    Route::post('school/type', 'SchoolTypeController@add');
    Route::get('school/type/{id}', 'SchoolTypeController@detail');
    Route::put('school/type/{id}', 'SchoolTypeController@update');
    Route::delete('school/type/{id}', 'SchoolTypeController@delete');
  
});

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
