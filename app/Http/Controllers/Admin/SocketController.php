<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LRedis;

class SocketController extends Controller
{
    public function index()
    {
    	return view('socket');
    }

    public function writemessage()
    {
    	return view('writemessage');
    }

    public function sendMessage(Request $request)
    {
	    $redis = LRedis::connection();
	    $redis->publish('message', $request->get('message'));

	    $redis->publish('me', $request->get('message'));
	   // return redirect('admin/writemessage');
    }
}
