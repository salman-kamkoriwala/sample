<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('crypto/single', 'crypto@singlecurrency');
Route::post('crypto/single', 'crypto@singlecurrency');
Route::get('crypto/multi', 'crypto@multicurrency');
Route::post('crypto/multi', 'crypto@multicurrency');

Route::get('socket', 'socketController@index');
Route::post('sendmessage', 'socketController@sendMessage');
Route::get('writemessage', 'socketController@writemessage');