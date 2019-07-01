<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Creativeorange\Gravatar\Gravatar;
use App\Http\Requests\Chat\ChatMessageSentRequest;
use App\Events\{PrivateMessageSent, PublicMessageSent};


class SocketController extends Controller
{

    public function sendMessage(ChatMessageSentRequest $request)
    {
        $id = $request->get('conversationId');
        $user = Auth::user();
        $content = $request->get('message');
        $conversation = Conversation::findOrFail($id);

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
        $conversation = Conversation::where('public', '=', true)->first();
        $messages = $conversation->messages()->get()->sortBy(function($message){
            return $message->pivot->created_at;
        });

        return view('partials/chat/history', compact('conversation', 'messages'));
    }

    public function privateChat(Request $request){
        
        $conversation = Conversation::findOrFail($request->get('conversation'));
        $messages = $conversation->messages()->orderBy('conversation_user_message.created_at', 'desc')->paginate(10);

        $next = $messages->nextPageUrl();

        $paginatorLinks = $messages->links();
        $messages = $messages->sortBy(function($message){
            return $message->pivot->created_at;
        });

        if($request->get('page')){ //paginator
            $authId = Auth::user()->id;
            $view = view('partials/chat/messages-list', compact('messages', 'authId'))->render();
            return response()->json(compact('view', 'next'));
        }
        
        return view('partials/chat/history', compact('conversation', 'messages', 'next'));
    }
}
