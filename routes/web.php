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

Route::get('/home', 'HomeController@index');

Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/projects', 'PagesController@projects');

Auth::routes();

Route::get('add_news', 'DataController@show');
Route::post('insert_news', 'DataController@insert_news');
Route::get('news', 'DataController@show_news');
Route::get('guitars', 'DataController@show_guitars');
Route::get('details&{id?}', 'DataController@show_details');
Route::post('search', 'DataController@search');

