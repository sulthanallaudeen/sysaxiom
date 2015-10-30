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
#Access Info
Route::any('getPlatform', 'PublicController@getPlatform');
Route::any('getBrowser/{data}', 'PublicController@getBrowser');
Route::any('getIp', 'PublicController@getIp');
Route::any('getTime', 'PublicController@getTime');
Route::any('accessLog/{way}', 'PublicController@accessLog');
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
#Task
Route::get('listtask', 'HomeController@listTask');
Route::get('createtask', 'HomeController@createTask');
Route::post('postTask', 'HomeController@postTask');
Route::get('edittask/{id}', 'HomeController@editTask');
Route::post('updateTask', 'HomeController@updateTask');
#Task
Route::get('listcat', 'HomeController@listCat');
Route::get('createcat', 'HomeController@createCat');
Route::post('postCat', 'HomeController@postCat');
Route::get('editcat/{id}', 'HomeController@editCat');
Route::post('updateCat', 'HomeController@updateCat');
#Settings
Route::get('profile-settings', 'HomeController@profileSettings');
Route::post('getAdminProfileSettingsData', 'HomeController@adminProfileSettingsData');
Route::post('updateAdminUserName', 'HomeController@updateAdminUserName');
Route::post('updateAdminEmail', 'HomeController@updateAdminEmail');
Route::post('updateAdminPassword', 'HomeController@updateAdminPassword');
#App Configuration
Route::get('appconfig', 'HomeController@appConfig');
#Web Services :: Depreciated
Route::get('b', 'PublicController@adminLogin');
Route::any('checkSession', 'PersonalManager@checkSession');
Route::post('authLogin', 'PersonalManager@authLogin');
Route::get('home', 'HomeController@index');
#Default Auth Route
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
