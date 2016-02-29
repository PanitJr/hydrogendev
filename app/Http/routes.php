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

Route::get('/', function () {
    return view('welcome');
});

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
//course
Route::get('/courses','CourseController@index');
Route::get('/courses/{id}','CourseController@findById');
Route::delete('/courses/{id}/delete','CourseController@destroy');
Route::put('/courses/{id}/update','CourseController@update');
Route::get('/courses/tag/{tag}','CourseController@findByTag');
//picture
Route::put('/picture/upload','PictureController@store');
Route::put('/picture/{hash}','PictureController@show');

Route::group(['middleware' => ['web']], function () {
    //
});
