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
Route::get('/pageNotFound','HomeController@pageNotFound')->name('notfound');
Route::get('/admin',['middleware'=> 'admin',function(){
		 return view('dashboard');
}]);
// Route::get('/admin','HomeController@admin');

Route::get('/process', function(){
	return view('howItWorks');
});
Route::get('/about', function(){
	return view('about');
});
Route::get('/services', function(){
	return view('services');
});

Route::post('/register/step2','Auth\AuthController@store');
// Route::get('/auth/logout', 'Auth\AuthController@getLogout')->name('logout');
Route::get('/event/create','EventController@create');
Route::post('/event/create','EventController@store');
Route::get('/event/showall','EventController@show');
Route::get('/event/{id}/join','EventController@join');
Route::get('/event/{id}/leave','EventController@leave');
Route::get('/event/{id}',['uses'=>'EventController@singleEvent']);
// auth controller

Route::get('/index', function(){
	return view('index');
});
Route::get('/home', 'HomeController@index');
Route::post('/register/step2','Auth\AuthController@store');


// Auth Controller

Route::auth();
Route::post('/register/step2','Auth\AuthController@store');
Route::get('/register/step2','Auth\AuthController@step2')->name('step2');
Route::post('/step2','Auth\AuthController@store2')->name('poststep2');

Route::get('/createGroup','GroupController@create')->name('creategroup');
Route::post('/createGroup','GroupController@store');
Route::get('/Group/index','GroupController@index');
Route::get('/group/{id}','GroupController@join')->where('id','[0-9]+');
Route::get('/createGroup','GroupController@create')->name('creategroup');
Route::post('/createGroup','GroupController@store');
Route::get('/createGroup/index','GroupController@index');
Route::get('/group/join/{groupid}','GroupController@joingroup')->where('groupid','[0-9]+');
Route::get('group/leave/{groupid}','GroupController@leavegroup')->where('groupid','[0-9]+');
/*
Route::get('/createGroup','GroupController@create')->name('creategroup');
Route::post('/createGroup','GroupController@store');
Route::get('/createGroup/index','GroupController@index');
*/ 
//Route for Group
Route::get('/createGroup','GroupController@createGroup')->name('creategroup');
Route::post('/storeGroup', 'GroupController@storeGroup')->name('create');
// group controller
Route::get('/createGroup','GroupController@create')->name('creategroup');
Route::post('/group/store','GroupController@storeGroup');
//Route::get('/login', 'LoginController@show');
Route::get('/home', 'HomeController@index');
//Route for Manage Account(Profile)
Route::get('/profile', 'ProfileController@profileView')->name('profile');
Route::get('/updateDetail', 'ProfileController@formView')->name('updateView');
Route::post('/insertDetail', 'ProfileController@update')->name('insert');
//Route for Joined Event (My Event Page)
Route::get('/myEvent', 'MyEventController@showEventList')->name('myEvent');
Route::get('/leaveEvent/{event_id}', 'MyEventController@leaveEvent');



// Routes for Admin
	Route::group(['prefix'=>'admin'],function(){
	Route::get('','HomeController@showPreferences')->middleware('admin')->name('dashboard');
	// Route::get('', 'HomeController@showPreferences')->name('dashboard');
	Route::get('preferences',function(){
		return view('adminPreferences');
	});
	Route::get('ignoreReport/{id}', 'HomeController@ignoreReport');
	Route::get('removeEvent/{id}', 'HomeController@removeEvent');
	Route::get('adminReports','HomeController@reportedEvents')->name('adminReports');
	Route::get('addParentName','HomeController@addParentName')->name('addParentName');
	Route::get('addChildName','HomeController@addChildName')->name('addChildName');
	Route::get('deleteParentName','HomeController@deleteParentName')->name('deleteParentName');
	Route::get('deleteChildName','HomeController@deleteChildName')->name('deleteChildName');
});


// Routes for Event
Route::group(['prefix'=>'event'],function(){
	Route::get('create','EventController@create');
	Route::post('create','EventController@store');
	Route::get('showall','EventController@show');
	Route::get('{id}/join','EventController@join')->where('id','[0-9]+');
	Route::get('/{id}/leave','EventController@leave')->where('id','[0-9]+');
	Route::get('/{id}',['uses'=>'EventController@singleEvent'])->where('id','[0-9]+');
	Route::get('{id}/report', 'EventController@reportEvent')->where('id','[0-9]+');
});

//history Event
Route::get('/history','EventController@showHistoryEvent');


//Routes for Group
Route::get('/createGroup','GroupController@create')->name('creategroup');
Route::post('/group/store','GroupController@storeGroup');
Route::get('/Group/index','GroupController@index')->name('showG');
Route::get('/group/{id}','GroupController@join')->where('id','[0-9]+');
Route::get('/group/join/{groupid}','GroupController@joingroup')->where('groupid','[0-9]+');
Route::get('group/leave/{groupid}','GroupController@leavegroup')->where('groupid','[0-9]+');
Route::get('/group/report/{groupid}','GroupController@reportGroup')->where('groupid','[0-9]+');


//Routes for Profile
Route::get('/profile', 'ProfileController@profileView')->name('profile');
Route::get('/updateDetail', 'ProfileController@formView')->name('updateView');
Route::post('/insertDetail', 'ProfileController@update')->name('insert');


//Routes for MyEvent
Route::get('/myEvent', 'MyEventController@showEventList')->name('myEvent');
Route::get('/leaveEvent/{event_id}', 'MyEventController@leaveEvent');
Route::post('/updateEvent', 'MyEventController@updateEvent')->name('updateEvent');
Route::get('/deleteEvent/{id}', 'MyEventController@deleteEvent');


//Routes for MyGroup
Route::get('/myGroup', 'MyGroupController@showGroupList')->name('myGroup');
Route::get('/leaveGroup/{group_id}', 'MyGroupController@leaveGroup');
Route::post('/updateGroup', 'MyGroupController@updateGroup')->name('updateGroup');
Route::get('/deleteGroup/{id}', 'MyGroupController@deleteGroup');
// Route::get('/{groupname}','HomeController@showGroups');
