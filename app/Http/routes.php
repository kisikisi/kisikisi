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
    'domain' => 'dir.'.env('APP_DOMAIN')
], function() {
    Route::get('/', function () {
        return view('directory');
    });
    Route::get('/{id}', function () {
        return view('directory');
    });
});

Route::group([
    'domain' => 'agenda.'.env('APP_DOMAIN')
], function() {
    Route::get('/', function () {
        return view('agenda');
    });
    Route::get('/{id}', function () {
        return view('agenda');
    });
});

Route::group([
    'domain' => 'dir.'.env('APP_DOMAIN')
], function() {
    Route::get('/', function () {
	    return view('directory');
	});
    Route::get('/{id}', function () {
	    return view('directory');
	});
});

Route::group([
    'domain' => 'agenda.'.env('APP_DOMAIN')
], function() {
    Route::get('/', function () {
	    return view('agenda');
	});
	Route::get('/{id}', function () {
	    return view('agenda');
	});
});

Route::group([
    'domain' => 'news.'.env('APP_DOMAIN')
], function() {
    Route::get('/', function () {
        return view('news');
    });
    Route::get('/{id}', function () {
        return view('news');
    });
});

Route::group([
    'domain' => 'api.' . env('APP_DOMAIN')
], function() {
    Route::post('/login', 'Auth\AuthController@login');
    
    //module school type
    Route::get('school/type', 'SchoolTypeController@index');
    Route::get('school/type/{id}', 'SchoolTypeController@detail');
    Route::get('school/type/scroll/{after}/{limit}', 'SchoolTypeController@scroll');
  
    //module school
    Route::get('school', 'SchoolDirectoryController@index');
    Route::get('school/form', 'SchoolDirectoryController@form');
    Route::post('school/search', 'SchoolDirectoryController@search');
    Route::get('school/paging/{page}/{limit}', 'SchoolDirectoryController@paging');
    Route::get('school/scroll/{after}/{limit}', 'SchoolDirectoryController@scroll');
    Route::get('school/{id}', 'SchoolDirectoryController@detail');
    
    //module news category
    Route::get('news/category', 'NewsCategoryController@index');
    Route::get('news/category/scroll/{after}/{limit}', 'NewsCategoryController@scroll');
    //module news
    Route::get('news/form', 'EducationNewsController@form');
    Route::get('news', 'EducationNewsController@index');
    Route::get('news/scroll/{after}/{limit}', 'EducationNewsController@scroll');
    Route::get('news/{id}', 'EducationNewsController@detail');

    //module agenda category
    Route::get('agenda/category', 'AgendaCategoryController@index');
    Route::get('agenda/category/scroll/{after}/{limit}', 'AgendaCategoryController@scroll');
    //module agenda
    Route::get('agenda/form', 'EducationAgendaController@form');
    Route::get('agenda', 'EducationAgendaController@index');
    Route::get('agenda/scroll/{after}/{limit}', 'EducationAgendaController@scroll');
    Route::get('agenda/{id}', 'EducationAgendaController@detail');
    
    //module label
    Route::get('label', 'LabelController@index');
    
    Route::group(['middleware' => 'ability:admin|manager'], function () {
       //module school type
        Route::post('school/type', 'SchoolTypeController@add');
        Route::put('school/type/{id}', 'SchoolTypeController@update');
        Route::delete('school/type/{id}', 'SchoolTypeController@delete');
        
       //module school
        Route::post('school/logo', 'SchoolDirectoryController@uploadLogo');
        Route::post('school/image', 'SchoolDirectoryController@uploadImage');
        Route::post('school', 'SchoolDirectoryController@add');
        Route::put('school/{id}', 'SchoolDirectoryController@update');
        Route::delete('school/{id}', 'SchoolDirectoryController@delete');
        
        //module education news
        Route::post('news/cover', 'EducationNewsController@uploadCover');
        Route::post('news/content', 'EducationNewsController@uploadContent');
        Route::post('news', 'EducationNewsController@add');
        Route::put('news/{id}', 'EducationNewsController@update');
        Route::delete('news/{id}', 'EducationNewsController@delete');
        //module news label
        Route::post('news/{news_id}/label/{label_id}', 'NewsLabelController@add');
        Route::delete('news/{news_id}/label/{label_id}', 'NewsLabelController@remove');
        //module news category
        Route::post('news/category', 'NewsCategoryController@add');
        Route::put('news/category/{id}', 'NewsCategoryController@update');
        Route::delete('news/category/{id}', 'NewsCategoryController@delete');
      
        //module education agenda
        Route::post('agenda/cover', 'EducationAgendaController@uploadCover');
        Route::post('agenda/content', 'EducationAgendaController@uploadContent');
        Route::post('agenda', 'EducationAgendaController@add');
        Route::put('agenda/{id}', 'EducationAgendaController@update');
        Route::delete('agenda/{id}', 'EducationAgendaController@delete');
        //module agenda label
        Route::post('agenda/{agenda_id}/label/{label_id}', 'AgendaLabelController@add');
        Route::delete('agenda/{agenda_id}/label/{label_id}', 'AgendaLabelController@remove');
        //module agenda category
        Route::post('agenda/category', 'AgendaCategoryController@add');
        Route::put('agenda/category/{id}', 'AgendaCategoryController@update');
        Route::delete('agenda/category/{id}', 'AgendaCategoryController@delete');
        
        //module label
        Route::post('label', 'LabelController@add');
        Route::put('label/{id}', 'LabelController@update');
        Route::delete('label/{id}', 'LabelController@delete');
        
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
