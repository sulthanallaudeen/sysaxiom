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
#Public Routes
Route::get('/', 'PublicController@index');
Route::get('blog', 'PublicController@blog');
Route::get('blog/{id}', 'PublicController@blogData');
Route::get('tag/{id}', 'PublicController@tagData');
Route::get('contact', 'PublicController@contact');
Route::get('gallery', 'PublicController@gallery');
Route::get('project', 'PublicController@project');
Route::get('technology', 'PublicController@technology');
Route::post('searchBlog', 'PublicController@searchBlog');
#Admin Panel Routes
Route::get('admin', 'PublicController@adminLogin');

Route::get('pm', 'PersonalManager@index');
Route::any('checkSession', 'PersonalManager@checkSession');
Route::post('authLogin', 'PersonalManager@authLogin');


Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
