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
Route::get('post/create', 'PostController@add')->middleware('auth');
Route::post('post/create', 'PostController@create')->middleware('auth');
Route::get('post/create', 'PostController@index')->middleware('auth');
Route::get('post/delete', 'PostController@delete')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
