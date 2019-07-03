<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Creativeorange\Gravatar\Gravatar;
use App\Models\{Conversation, Message};
use App\Http\Requests\Chat\ChatMessageSentRequest;
use App\Events\{PrivateMessageSent, PublicMessageSent};


class SocketController extends Controller
{

    public function sendMessage(ChatMessageSentRequest $request)
    {
        $id = $request->get('conversation');
        $user = Auth::user();
        $content = $request->get('message');
        $conversation = Conversation::findOrFail($id);
        
        $message = new Message();
        $message->conversation_id = $conversation->id;
        $message->user_id = $user->id;
        $message->content = $content;
        $message->save();

        $message = $this->makeMessage($user->name, $content, $id);

        if($conversation->public){
            broadcast(new PublicMessageSent($message, $id))->toOthers();
        }else{
            broadcast(new PrivateMessageSent($message, $id))->toOthers();
        }

	   return json_encode($message);
    }

    public function makeMessage($user, $content, $id){

        $time = Carbon::now()->diffForHumans();

        return (object)compact('content', 'user', 'time');
    }
}
