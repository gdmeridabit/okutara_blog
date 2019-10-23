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

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'], function() {

    Route::get('/', 'BaseController@index')->name('home');

    Auth::routes();

    Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');

    Route::get('/create-post', 'PostController@index')->name('create')->middleware('auth');

    Route::get('/post/update/{id}', 'PostController@updateIndex')->middleware('auth');

    Route::get('/categories', 'CategoriesController@index')->name('categories');

    Route::get('/category/{id}', 'CategoriesController@listIndex')->name('categorize-post');

    Route::get('/post/{id}', 'PostController@postListIndex')->name('post-list');
});

//GUEST
Route::permanentRedirect('/', '/en');

Route::post('/create', 'PostController@create')->middleware('auth');

Route::put('/post/updated', 'PostController@update')->middleware('auth');

Route::get('/like/{id}', 'PostController@like')->middleware('auth');

Route::get('/dashboard/{id}', 'HomeController@deletePost')->middleware('auth');
