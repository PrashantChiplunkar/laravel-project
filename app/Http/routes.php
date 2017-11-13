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
    return redirect()->action('AuthController@login');
});

//Route::auth();
Route::get('/login','AuthController@login');
Route::post('/login','AuthController@login_credentials');

Route::get('/register','AuthController@register');
Route::post('/register','AuthController@register_user');


//Route::get('/home', 'AuthController@login');
Route::get('/home', function () {
    return redirect()->action('AuthController@login');
});
Route::get('/contacts', 'PagesController@about');
Route::post('/contacts', 'PagesController@store');
Route::get('/contacts/{id}', 'PagesController@user_data');
Route::post('/contacts/{id}', 'PagesController@update_user_data');

Route::get('/about','PagesController@get_employees');

Route::get('/contact', 'PagesController@contact');
Route::post('/contact', 'PagesController@store');
Route::get('contacts/{id}/delete', 'PagesController@delete');
Route::get('/dashboard','DashboardController@dashboard');
Route::post('/dashboard','DashboardController@update_dashboard');
Route::post('/upload','DashboardController@upload_image');
Route::get('/delete','DashboardController@delete_picture');
Route::get('/logout','AuthController@logout');
