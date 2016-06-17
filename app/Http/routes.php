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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//Crypto Routes
Route::get('crypto/single', 'crypto@singlecurrency');
Route::post('crypto/single', 'crypto@singlecurrency');
Route::get('crypto/multi', 'crypto@multicurrency');
Route::post('crypto/multi', 'crypto@multicurrency');
//end Crypto

//Socket Routes
Route::get('socket', 'socketController@index');
Route::post('sendmessage', 'socketController@sendMessage');
Route::get('writemessage', 'socketController@writemessage');
//end Socket

//Message Routes
Route::get('/', function () {
	return view('message.send');
});
Route::post('/','SendController@postCreate');
Route::get('message','MessageController@index');
Route::post('message','MessageController@updateSeen');
//end Message