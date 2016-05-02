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
	Route::post('/login', 'Auth\AuthController@login');	
	Route::get('/', function () {
	    return view('admin');
	});	
	Route::get('{state}', function () {
	    return view('admin');
	});
	Route::get('{state}/{sub}', function () {
	    return view('admin');
	});
});

Route::group([
    'domain' => 'api.' . env('APP_DOMAIN')
], function() {
	Route::post('/login', 'Auth\AuthController@login');
    
	//module school type
	Route::get('school/type', 'SchoolTypeController@index');
    Route::get('school/type/{id}', 'SchoolTypeController@detail');
  
	//module school type
	Route::get('school', 'SchoolDirectoryController@index');
	Route::get('school/{id}', 'SchoolDirectoryController@detail');
    
    //module news
    Route::get('news', 'EducationNewsController@index');
    Route::get('news/{id}', 'EducationNewsController@detail');
    
    //module news category
    Route::get('news/category', 'NewsCategoryController@index');
    
    Route::group(['middleware' => 'ability:admin|manager'], function () {
	   //module school type
        Route::post('school/type', 'SchoolTypeController@add');
        Route::put('school/type/{id}', 'SchoolTypeController@update');
        Route::delete('school/type/{id}', 'SchoolTypeController@delete');
        
	   //module school type
        Route::post('school', 'SchoolDirectoryController@add');
        Route::put('school/{id}', 'SchoolDirectoryController@update');
        Route::delete('school/{id}', 'SchoolDirectoryController@delete');
        
        //module education news
        Route::post('news', 'EducationNewsController@add');
        Route::put('news/{id}', 'EducationNewsController@update');
        Route::delete('news/{id}', 'EducationNewsController@delete');

        //module new category
        Route::post('news/category', 'NewsCategoryController@add');
        Route::put('news/category/{id}', 'NewsCategoryController@update');
        Route::delete('news/category/{id}', 'NewsCategoryController@delete');

    });
    
});

Route::group([
    'domain' => 'dir.'.env('APP_DOMAIN')
], function() {
    Route::get('/', function () {
	    return view('directory');
	});
});

Route::get('/', function () {
    return view('portal');
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
