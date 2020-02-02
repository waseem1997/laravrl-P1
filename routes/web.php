<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/posts', 'f_post@showPost'); // here i'm using controller 'controller_name@function_name'

Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function() {

    Route::get('/add_new_post', 'f_post@addNewPost');

    Route::POST('/insert_post', 'f_post@insertPost');

    Route::get('/update/{post_id}', 'f_post@updatePost');// i want to send a variable to the controller so i put it in { }

    Route::POST('/edit/{post_id}', 'f_post@editPost');

});

   


// this is the routes of the authentication process 
// and these are generated automatically by: php artisan ui:auth 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// set the logout route:
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/posts'); // after logging out redirect me to the posts page 
});