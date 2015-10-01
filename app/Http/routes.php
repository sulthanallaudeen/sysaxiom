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

#Public Controller
Route::get('/', 'PublicController@index');
Route::get('blog', 'PublicController@blog');
Route::get('blog/{id}', 'PublicController@blogData');
Route::get('tag/{id}', 'PublicController@tagData');
Route::get('tag/{id}/about', 'PublicController@tagAbout');
Route::get('contact', 'PublicController@contact');
Route::post('sendMail', 'PublicController@sendMail');
Route::get('gallery', 'PublicController@gallery');
Route::get('project', 'PublicController@project');
Route::get('technology', 'PublicController@technology');
Route::post('searchBlog', 'PublicController@searchBlog');


#Admin Controller
Route::get('sa', 'PublicController@adminLogin');
Route::post('authAdmin', 'PublicController@authAdminLogin');
Route::get('logout', 'PublicController@logoutAdmin');
Route::get('dashboard', 'HomeController@adminDashboard');
#Blog
Route::get('listblog', 'HomeController@listBlog');
Route::get('writeblog', 'HomeController@writeBlog');
Route::post('postBlog', 'HomeController@postBlog');
Route::get('editblog/{id}', 'HomeController@editBlog');
Route::post('updateBlog', 'HomeController@updateBlog');
#Tag
Route::get('listtag', 'HomeController@listTag');
Route::get('writetag', 'HomeController@writeTag');
Route::post('postTag', 'HomeController@postTag');
Route::get('edittag/{id}', 'HomeController@editTag');
Route::post('updateTag', 'HomeController@updateTag');
#App Configuration
Route::get('appconfig', 'HomeController@appConfig');

#Web Services :: Depreciated
Route::get('b', 'PublicController@adminLogin');
Route::any('checkSession', 'PersonalManager@checkSession');
Route::post('authLogin', 'PersonalManager@authLogin');


Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
