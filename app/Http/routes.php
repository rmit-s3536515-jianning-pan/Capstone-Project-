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
Route::get('/admin',['middleware'=> 'admin',function(){
		 return view('dashboard');
}]);

// Route::get('/admin','HomeController@admin');
Route::get('/index', function(){
	return view('index');
});


Route::get('/home', 'HomeController@index');
Route::post('/register/step2','Auth\AuthController@store');

// Route::get('/auth/logout', 'Auth\AuthController@getLogout')->name('logout');
Route::get('/event/create','EventController@create');
Route::post('/event/create','EventController@store');
Route::get('/event/showall','EventController@show');
Route::get('/event/{id}/join','EventController@join');
Route::get('/event/{id}/leave','EventController@leave');
Route::get('/event/{id}',['uses'=>'EventController@singleEvent']);

// auth controller
Route::auth();
Route::post('/register/step2','Auth\AuthController@store');
Route::get('/register/step2','Auth\AuthController@step2')->name('step2');
Route::post('/step2','Auth\AuthController@store2')->name('poststep2');

//Route for Group
Route::get('/createGroup','GroupController@create')->name('creategroup');
Route::post('/group/store','GroupController@storeGroup');
Route::get('/Group/index','GroupController@index');
Route::get('/group/{id}','GroupController@join')->where('id','[0-9]+');
Route::get('/group/join/{groupid}','GroupController@joingroup')->where('groupid','[0-9]+');
Route::get('group/leave/{groupid}','GroupController@leavegroup')->where('groupid','[0-9]+');

//Route for Profile
Route::get('/profile', 'ProfileController@profileView')->name('profile');
Route::get('/updateDetail', 'ProfileController@formView')->name('updateView');
Route::post('/insertDetail', 'ProfileController@update')->name('insert');

//Route for My Event
Route::get('/myEvent', 'MyEventController@showEventList')->name('myEvent');
Route::get('/leaveEvent/{event_id}', 'MyEventController@leaveEvent');
Route::post('/updateEvent', 'MyEventController@updateEvent')->name('updateEvent');
Route::get('/deleteEvent/{id}', 'MyEventController@deleteEvent');

//Route for My Group
Route::get('/myGroup', 'MyGroupController@showGroupList')->name('myGroup');
Route::get('/leaveGroup/{group_id}', 'MyGroupController@leaveGroup');
Route::post('/updateGroup', 'MyGroupController@updateGroup')->name('updateGroup');
Route::get('/deleteGroup/{id}', 'MyGroupController@deleteGroup');
/*Route::get('/{groupname}','HomeController@showGroups');*/
