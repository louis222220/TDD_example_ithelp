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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', 'PostController@allPost');

Route::get('/post/insert', 'PostController@insertPost');

Route::get('/post/form', function () {
    return view('post_form');
});

Route::post('/post', 'PostController@insertPost');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
