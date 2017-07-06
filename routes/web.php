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



Auth::routes();

Route::get('/', 'PagesController@welcome');

Route::get('user_welcome', 'PagesController@user_welcome');

Route::get('/home', 'DataController@show_user_guitars');

Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/projects', 'PagesController@projects');

Auth::routes();

Route::get('add_news', 'DataController@show');
Route::post('insert_news', 'DataController@insert_news');
Route::get('news', 'DataController@show_news');
Route::get('guitars', 'DataController@show_guitars');
Route::get('details&{id?}', 'DataController@show_details');
Route::get('search', 'DataController@search');

Route::get('user_guitars', 'DataController@show_user_guitars');
Route::get('user_details&{id?}', 'DataController@show_user_details');
Route::get('user_favorites', 'DataController@show_user_favorites');
Route::get('user_favorites_details&{id?}', 'DataController@show_user_favorites_details');
Route::get('user_search', 'DataController@user_search');
Route::get('user_comment&{id?}', 'DataController@user_comment');
Route::get('user_add_comment&{id?}', 'DataController@user_add_comment');
