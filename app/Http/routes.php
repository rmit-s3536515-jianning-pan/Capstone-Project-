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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'HomeController@welcome');
Route::get('/admin',['middleware'=> 'admin',function(){
		 return view('admin.administration');
}]);

// Route::get('/admin','HomeController@admin');

Route::get('/index', function(){
	return view('index');
});

Route::post('/register/step2','Auth\AuthController@store');

// Route::get('/auth/logout', 'Auth\AuthController@getLogout')->name('logout');
Route::get('/event/create','EventController@create');
Route::post('/event/create','EventController@store');
Route::get('/event/showall','EventController@show');
Route::get('/event/{id}/join','EventController@join');
Route::get('/event/{id}/leave','EventController@leave');
Route::get('/event/{id}',['uses'=>'EventController@singleEvent']);


Route::auth();
Route::post('/register/step2','Auth\AuthController@store'); 

Route::get('/register/step2','Auth\AuthController@step2')->name('step2');
Route::post('/step2','Auth\AuthController@store2')->name('poststep2');



Route::get('/createGroup','GroupController@create')->name('creategroup');
//Route::get('/login', 'LoginController@show');


Route::get('/home', 'HomeController@index');

//Route for Manage Account(Profile)
Route::get('/profile', 'ProfileController@profileView')->name('profile');
Route::get('/updateDetail', 'ProfileController@formView')->name('updateView');
Route::post('/insertDetail', 'ProfileController@update')->name('insert');
