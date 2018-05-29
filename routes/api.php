<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('users/{user}/markers/{marker?}', 'UserMarkersController@index');
Route::post('users/{user}/markers', 'UserMarkersController@store');
Route::delete('users/{user}/markers/{marker}', 'UserMarkersController@delete');
Route::put('users/{user}/markers/{marker}', 'UserMarkersController@unvisit');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
