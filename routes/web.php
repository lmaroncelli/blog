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

Route::view('/demo', 'demo');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/search', 'HomeController@search')->name('search');
Route::get('/show_articolo/{id}', 'HomeController@showArticolo')->name('show_articolo');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'AdminController@index')->name('dashboard');

    Route::resource('article', 'ArticleController');
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    
});

