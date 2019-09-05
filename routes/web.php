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

Route::get('/post/update/{id}', 'PostController@updateIndex')->middleware('auth');

Route::put('/post/updated', 'PostController@update')->middleware('auth');

Route::get('/post/{id}', 'PostController@post')->name('post');

Route::get('/categories', 'CategoriesController@index')->name('categories');

Route::get('/category/{id}', 'CategoriesController@list');

Route::get('/like/{id}', 'PostController@like')->middleware('auth');

Route::get('/dashboard/{id}', 'HomeController@deletePost')->middleware('auth');
