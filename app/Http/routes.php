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
Route::get('crypto/single', ['middleware' => 'auth', 'uses' => 'crypto@singlecurrency']);
Route::post('crypto/single', ['middleware' => 'auth', 'uses' => 'crypto@singlecurrency']);
Route::get('crypto/multi', ['middleware' => 'auth', 'uses' => 'crypto@multicurrency']);
Route::post('crypto/multi', ['middleware' => 'auth', 'uses' => 'crypto@multicurrency']);
//end Crypto

//Socket Routes - ref: https://www.codetutorial.io/laravel-5-and-socket-io-tutorial/
Route::get('socket', 'socketController@index');
Route::post('sendmessage', 'socketController@sendMessage');
Route::get('writemessage', 'socketController@writemessage');
//end Socket

//Message Routes - ref: https://github.com/moemoe89/Simple-realtime-message-SocketIO-NodeJS-Laravel
Route::get('postMessage', ['as' => 'messageform', 'uses' => function () {
	return view('message.send');
}]);
Route::post('postMessage',['as' => 'writemessage', 'uses' => 'SendController@postCreate']);
Route::get('message', ['as' => 'listmessage', 'uses' => 'MessageController@index']);
Route::post('message','MessageController@updateSeen')->name('updateread');
//end Message

//EventTest Routes - ref: https://laracasts.com/discuss/channels/general-discussion/step-by-step-guide-to-installing-socketio-and-broadcasting-events-with-laravel-51
Route::group(['as' => 'events::'], function () {
	Route::get('fire', ['as' => 'contactform', function () {
		// this fires the event
		event(new App\Events\EventTest());
		return "event fired";
	}]);
	
	Route::get('test', ['as' => 'listcontacts', function () {
		// this checks for the event
		return view('event.test');
	}]);
});
//end EventTest

//Registering all Routes to Navigation Menu for dumping in Navigation bar in view
Menu::make('MyNavBar', function($menu){

	$menu->add('Home');

	$menu->add('GoURL Io Crypto', '');
	$menu->goURLIoCrypto->add('Single Currency Payment', 'crypto/single')->link->secure();
	$menu->goURLIoCrypto->add('Multi Currency Payment', array('action' => 'crypto@multicurrency', 'secure' => true));

	$menu->add('Socket', '');
	$menu->socket->add('List Messages', 'socket');
	$menu->socket->add('Write Messages', 'writemessage');
	
	$menu->add('Message',  '');
	$menu->message->add('Write a Message', array('route' => 'messageform'));
	$menu->message->add('List all Messages', array('route' => 'listmessage'));
	
	$menu->add('Event',  '');
	$menu->event->add('Contact Us', array('route' => 'events::contactform'));
	$menu->event->add('List all Contact Queries', array('route' => 'events::listcontacts'));

});
//end Registering
Route::auth();

Route::get('/home', 'HomeController@index');
