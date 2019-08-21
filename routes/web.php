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

//GUEST
Route::get('/', 'BaseController@index');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');

Route::get('/create-post', 'PostController@index')->name('create')->middleware('auth');

Route::post('/create', 'PostController@create')->middleware('auth');

Route::get('/post/{id}', 'PostController@post')->name('post')->middleware('auth');

Route::get('/categories', 'CategoriesController@index')->middleware('auth');

Route::get('/category/{id}', 'CategoriesController@list')->middleware('auth');
