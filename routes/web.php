<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//middleware admin
Route::group(['middleware' => 'admin'], function () 
{
	// auth Admins
	Route::group(['middleware' => 'auth:admin'], function () 
    {
			Route::get('Admins/home', 'AdminsController@home');
			Route::get('Admins/logout', 'AdminsController@logout');

    });

    	   Route::resource('Admins','AdminsController');

}); 


//middleware users
Route::group(['middleware' => 'web'], function () 
{
	 Auth::routes();

     Route::get('/users', 'HomeController@index'); 
}); 



// Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
//     return "this page requires that you be logged in and an Admin";
// }]);
