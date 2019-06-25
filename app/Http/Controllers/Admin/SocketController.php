<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Events\PublicMessageSent;
use App\Events\PrivateMessageSent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SocketController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
        $id = $request->get('conversationId');
        $user = Auth::user();
        $content = $request->get('message');
        // try {
            $conversation = Conversation::findOrFail($id);

        // } catch (Exception $e) {
        //     return response()->json(403);            
        // }
        $message = $conversation->messages()->save(
                $user,
                ['message' => $content]
            );
        $message = $this->makeMessage($user->name, $content);

        if($conversation->public){
            broadcast(new PublicMessageSent($message))->toOthers();
        }else{
            broadcast(new PrivateMessageSent($message, $id))->toOthers();
        }

	   return json_encode($message);
    }

    public function makeMessage($user, $content){
        $time = Carbon::now()->diffForHumans();

        return (object)compact('content', 'user', 'time');
    }

    public function publicChat(){
        $conversation = Conversation::first();
        $messages = $conversation->messages()->take(200)->get();

        return view('partials/chat/history', compact('conversation', 'messages'));
    }

    public function privateChat(Request $request){

        $conversation = Conversation::findOrFail($request->get('conversation'));
        $messages = $conversation->messages()->take(200)->get();

        return view('partials/chat/history', compact('conversation', 'messages'));
    }
}
