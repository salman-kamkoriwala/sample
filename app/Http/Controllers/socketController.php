<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use LRedis;

class socketController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}
	public function index()
	{
		return view('socket.socket');
	}
	public function writemessage()
	{
		return view('socket.writemessage');
	}
	public function sendMessage(Request $request){
		$redis = LRedis::connection();
		$redis->publish('message', $request->input('message'));
		return redirect('writemessage');
	}
}
