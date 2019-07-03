<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{Conversation, Message, User};

class ConversationsController extends Controller
{
    public function create(){
    	$users = User::with(['roles' => function($role){
    	    $role->where('name', 'admin');
    	}])->where('id', '!=', Auth()->user()->id)->get();

    	return view('partials/conversations/addNewConversation', compact('users'));
    }

    public function store(Request $request){
    	$user = Auth::user();
    	$name = $request->get('name');
    	$participants = $request->get('participants');
    	$participants[] = $user->id;
    	$message = $request->get('message');

    	$conversation = new Conversation();
    	$conversation->user_id = $user->id;
    	$conversation->name = $name;
    	$conversation->save();

    	foreach($participants as $participant){
    		$conversation->participants()->attach($participant);
    	}

    	if($message){
    		$conversation->messages()->attach($user, ['message'=>$message]);
    	}
    	$view = view('partials/chat/contact', compact('conversation'))->render();
    	$data = [
    		'view' => $view,
    		'conversationId' => $conversation->id
    	];

    	return response()->json($data);
    }

    public function conversationHistory(Request $request){
        if($request->get('public')){
            $conversation = Conversation::where('public', '=', true)->first();
        }else{
            $conversation = Conversation::findOrFail($request->get('conversation'));
        }
        $messages = $conversation->messages();
        $messages = $messages->orderBy('messages.created_at', 'desc')->paginate(10);

        $next = $messages->nextPageUrl();

        $paginatorLinks = $messages->links();
        $messages = $messages->sortBy(function($message){
            return $message->created_at;
        });
        if($request->get('page')){ //paginator
            $authId = Auth::user()->id;
            $view = view('partials/chat/messages-list', compact('messages', 'authId'))->render();
            return response()->json(compact('view', 'next'));
        }
        
        $this->messagesSeen($messages->last());

        return view('partials/chat/history', compact('conversation', 'messages', 'next'));
    }

    public function messagesSeen(Message $message){
        
        try {
            $message->users()->attach(Auth::user());
            return;
        } catch (Exception $e) {
            return;
        }     
    }

    public function delete(Conversation $conversation){
        $user = Auth::user();
        if($conversation->participants->contains($user)){
            $conversation->participants()->detach($user);
            $conversation->messages()->save(
                $user,
                ['message' => "{$user->name} left the conversation."]
            );
            
            return back()->with('success', 'You Successfully removed this conversation.');
        }else{

            return response()->json(403);
        }
    }
}
