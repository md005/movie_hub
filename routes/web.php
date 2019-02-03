<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
 */

//##########
//frontend
//##########

//Route::get('/', function () {
//    return view('welcome');
//});

//home page load
Route::get('/', 'HomeController@index');


//add comment
Route::post('save-comment','CommentController@addComment');



//##########
//backend
//##########


//admin login authentication
Route::get('/admin', 'AdminController@index');
Route::post('/admin-login', 'AdminController@adminLogin');
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/logout', 'SuperAdminController@logout');


//movie section
Route::get('/add-movie', 'MovieController@addMovie');
Route::post('/save-movie', 'MovieController@saveMovie');
Route::get('/manage-movie', 'MovieController@manageMovie');
Route::get('unpublish-movie/{id}', 'MovieController@unpublishMovie');
Route::get('publish-movie/{id}', 'MovieController@publishMovie');
Route::get('delete-movie/{id}', 'MovieController@deleteMovie');
Route::get('edit-movie/{id}', 'MovieController@editMovie');
Route::post('update-movie', 'MovieController@updateMovie');
Route::get('movie-details/{id}', 'MovieController@movieDetails'); //single movie view


//comment section
Route::get('/manage-comment', 'CommentController@manageComment');

Route::get('delete-comment/{id}', 'CommentController@deleteComment');




//user section
Route::get('/add-user', 'UserController@addUser');
Route::post('/save-user', 'UserController@saveUser');
Route::get('/manage-user', 'UserController@manageUser');
Route::get('unpublish-user-status/{id}', 'UserController@unpublishUser');
Route::get('publish-user-status/{id}', 'UserController@publishUser');
Route::get('delete-user/{id}', 'UserController@deleteUser');
Route::get('edit-user/{id}', 'UserController@editUser');
Route::post('update-user', 'UserController@updateUser');

