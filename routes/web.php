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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'ajax'], function() {
// all routes that don't need to go to react-router
    Auth::routes();
});

Route::get('/{path?}', function () {
    return view('web')->with('user', Auth::user());
})->where('path', '.*');
