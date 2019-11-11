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
    $links = \App\Link::all();
    return view('welcome', ['links'=> $links]);
});

Route::get('/submit', 'LinkController@index');
Route::post('/submit','LinkController@post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
