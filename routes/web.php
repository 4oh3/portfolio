<?php

Route::get('/', function () {
	return view('index');
});

Route::resource('projects', 'ProjectController');

// Contact Sumbit
Route::post('/submit', 'ContactController@mailToAdmin');

// Auth
 Route::post('auth/register', 'AuthController@register');

Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => 'jwt.auth'], function(){
	Route::get('auth/user', 'AuthController@user');
	Route::post('auth/logout', 'AuthController@logout');
});

Route::group(['middleware' => 'jwt.refresh'], function(){
	Route::get('auth/refresh', 'AuthController@refresh');
});

// Error Handling
Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@error404']);

// Individual Routing
Route::get('/about', function (){
	return view('index');
});

Route::get('/contact', function (){
	return view('index');
});
