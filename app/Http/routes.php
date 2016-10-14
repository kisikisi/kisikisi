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
    'domain' => 'setup.' . env('APP_DOMAIN')
], function() {
    Route::post('/login/{role}', 'Auth\AuthController@login')->where('role', '(setup)');
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
    'domain' => 'direktori.'.env('APP_DOMAIN')
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
    'domain' => 'direktori.'.env('APP_DOMAIN')
], function() {
    Route::get('/', function () {
	    return view('directory');
	});
    Route::get('/{id}', function () {
	    return view('directory');
	});
	Route::get('/{id}/{slug}', function () {
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
	Route::get('/{id}/{slug}', function () {
        return view('agenda');
    });
});
Route::group([
    'domain' => 'berita.'.env('APP_DOMAIN')
], function() {
    Route::get('/', function () {
        return view('news');
    });
    Route::get('/{id}', function () {
        return view('news');
    });
	Route::get('/{id}/{slug}', function () {
        return view('news');
    });
});
Route::group([
    'domain' => 'learning.'.env('APP_DOMAIN')
], function() {
    Route::get('/', function () {
        return view('course');
    });
    Route::get('/{id}', function () {
        return view('course');
    });
	Route::get('/{id}/{slug}', function () {
        return view('course');
    });
});

Route::group([
    'domain' => 'beasiswa.'.env('APP_DOMAIN')
], function() {
    Route::get('/', function () {
        return view('scholarship');
    });
    Route::get('/{id}', function () {
        return view('scholarship');
    });
	Route::get('/{id}/{slug}', function () {
        return view('scholarship');
    });
});

Route::group(['domain' => '{module}.'.env('APP_DOMAIN')], function () {
    Route::post('/login', 'Auth\AuthController@login');
    Route::post('/register', 'Auth\AuthController@register');
    Route::get('/auth/user', 'Auth\AuthController@getAuthUser');
});

Route::group([
    'domain' => 'api.' . env('APP_DOMAIN')
], function() {
    //Route::post('/login', 'Auth\AuthController@login');
    //Route::post('/login/{role}', 'Auth\AuthController@login')->where('role', '(setup)');
	Route::get('user/form', 'UserController@form');

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
    Route::get('agenda/calendar', 'EducationAgendaController@calendar');
	Route::get('agenda/scroll/{after}/{limit}', 'EducationAgendaController@scroll');
    Route::get('agenda/{id}', 'EducationAgendaController@detail');

	//module scholarship degree
    Route::get('scholarship/degree', 'ScholarshipDegreeController@index');
	Route::get('scholarship/degree/scroll/{after}/{limit}', 'ScholarshipDegreeController@scroll');
    //module scholarship
    Route::get('scholarship/form', 'ScholarshipController@form');
    Route::get('scholarship', 'ScholarshipController@index');
	Route::get('scholarship/scroll/{after}/{limit}', 'ScholarshipController@scroll');
    Route::get('scholarship/{id}', 'ScholarshipController@detail');

	//module course
    Route::get('course/form', 'CourseController@form');
    Route::get('course', 'CourseController@index');
	Route::get('course/scroll/{after}/{limit}', 'CourseController@scroll');
    Route::get('course/{id}', 'CourseController@detail');
    
    //module label
    Route::get('label', 'LabelController@index');
    
    Route::get('news/{id}/share', 'EducationNewsController@share');

    Route::group(['middleware' => 'ability:admin|manager'], function () {

		//module dashboard
		Route::get('dashboard', 'DashboardController@index');

		//module user
		Route::get('user', 'UserController@index');
		Route::get('user/scroll/{after}/{limit}', 'UserController@scroll');

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
        
		//module education scholarship
        Route::post('scholarship/cover', 'ScholarshipController@uploadCover');
        Route::post('scholarship/content', 'ScholarshipController@uploadContent');
        Route::post('scholarship', 'ScholarshipController@add');
        Route::put('scholarship/{id}', 'ScholarshipController@update');
        Route::delete('scholarship/{id}', 'ScholarshipController@delete');
        //module scholarship category
        Route::post('scholarship/category', 'ScholarshipDegreeController@add');
        Route::put('scholarship/category/{id}', 'ScholarshipDegreeController@update');
        Route::delete('scholarship/category/{id}', 'ScholarshipDegreeController@delete');

		//module education course
        Route::post('course/cover', 'CourseController@uploadCover');
        Route::post('course/content', 'CourseController@uploadContent');
        Route::post('course', 'CourseController@add');
        Route::put('course/{id}', 'CourseController@update');
        Route::delete('course/{id}', 'CourseController@delete');
        //module course label
        Route::post('course/{course_id}/label/{label_id}', 'AgendaLabelController@add');
        Route::delete('course/{course_id}/label/{label_id}', 'AgendaLabelController@remove');

        //module label
        Route::post('label', 'LabelController@add');
        Route::put('label/{id}', 'LabelController@update');
        Route::delete('label/{id}', 'LabelController@delete');
        
    });
    Route::group(['middleware' => 'ability:admin'], function () {
		//user module
		Route::post('user', 'UserController@add');
		Route::get('user/{id}', 'UserController@edit');
        Route::put('user/{id}', 'UserController@update');
        Route::delete('user/{id}', 'UserController@delete');
	});
});

Route::get('/', 'PortalController@index');

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
