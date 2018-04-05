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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'HomeController@welcome');

Route::get('/index', function(){
	return view('index');
});

//Route::get('/login', 'LoginController@show');
Route::auth();

Route::get('/home', 'HomeController@index');

//Route for Profile View
Route::get('/profile', 'ProfileController@profileView')->name('profile');

Route::get('/updateDetail', 'ProfileController@formView')->name('updateView');

Route::post('/insertDetail', 'ProfileController@update')->name('insert');
