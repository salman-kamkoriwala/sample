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
//Default Laravel 5.2 Home/Welcome
Route::get('/', function () {
    return view('welcome');
});
//end Default

//Crypto Routes - ref: https://gourl.io/api-php.html
Route::get('crypto/single', 'crypto@singlecurrency');
Route::post('crypto/single', 'crypto@singlecurrency');
Route::get('crypto/multi', 'crypto@multicurrency');
Route::post('crypto/multi', 'crypto@multicurrency');
//end Crypto

//Socket Routes - ref: https://www.codetutorial.io/laravel-5-and-socket-io-tutorial/
Route::get('socket', 'socketController@index');
Route::post('sendmessage', 'socketController@sendMessage');
Route::get('writemessage', 'socketController@writemessage');
//end Socket

//Message Routes - ref: https://github.com/moemoe89/Simple-realtime-message-SocketIO-NodeJS-Laravel
Route::get('postMessage', function () {
	return view('message.send');
});
Route::post('postMessage','SendController@postCreate');
Route::get('message','MessageController@index');
Route::post('message','MessageController@updateSeen');
//end Message

//EventTest Routes - ref: https://laracasts.com/discuss/channels/general-discussion/step-by-step-guide-to-installing-socketio-and-broadcasting-events-with-laravel-51
Route::get('fire', function () {
	// this fires the event
	event(new App\Events\EventTest());
	return "event fired";
});

Route::get('test', function () {
	// this checks for the event
	return view('event.test');
});
//end EventTest