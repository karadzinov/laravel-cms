<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Events\ConversationCreated;
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

    public function saveConversation($id, $name){
        $conversation = new Conversation();
        $conversation->user_id = $id;
        $conversation->name = $name;
        $conversation->save();
        
        return $conversation;
    }

    public function saveMessage($user, $conversation, $message){
        $newMessage = new Message();
        $newMessage->user_id = $user;
        $newMessage->conversation_id = $conversation;
        $newMessage->content = $message;
        $newMessage->save();
        
        return $newMessage;
    }

    public function store(Request $request){
    	$user = Auth::user();
    	$name = $request->get('name');
    	$participants = $request->get('participants');
    	$participants[] = $user->id;
    	$message = $request->get('message');

    	$conversation = $this->saveConversation($user->id, $name);

    	foreach($participants as $participant){
    		try {
                $conversation->participants()->attach($participant);     
            } catch (Exception $e) {
            }
    	}

    	if($message){
            $newMessage = $this->saveMessage(
                    $user->id, $conversation->id, $message
                );
    	}

    	$view = view('partials/chat/contact', compact('conversation'))->render();
    	$data = [
    		'view' => $view,
    		'conversationId' => $conversation->id
    	];

        $this->notifyOthers($participants, $user, $data);

    	return response()->json($data);
    }

    public function notifyOthers($participants, $user, $data){
        
        foreach($participants as $participant){
            if($participant != $user->id){
                broadcast(new ConversationCreated($participant, $data));
            }
        }
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
        if($messages->last()){
            $this->messagesSeen($messages->last());
        }

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

            $message = new Message();
            $message->user_id = $user->id;
            $message->conversation_id = $conversation->id;
            $message->content = "{$user->name} left the conversation.";
            $message->save();
            
            return back()->with('success', 'You Successfully removed this conversation.');
        }else{

            return response()->json(403);
        }
    }

    public function search(Request $request){
        $searchTerm = '%'.$request->get('search').'%';
        
        $userConversationsIds = Auth::user()->conversations()->pluck('conversation_id')->toArray();

        $conversations = Conversation::whereIn('id', $userConversationsIds)
                            ->where('name', 'LIKE', $searchTerm)
                            ->select('name', 'id')->get();

        $messages = Message::whereIn('conversation_id', $userConversationsIds)
                        ->where('content', 'LIKE', $searchTerm)
                        ->get();
        if($messages->isNotEmpty()){
            foreach($messages as $message){

                $conversation = $message->conversation()
                                ->first(['name', 'id']);
                $conversation->messageContent = $message->content;

                $conversations->push($conversation);
            }
        }

        // $conversations = $conversations->unique('id');
        if($conversations->isNotEmpty()){
            
            return $conversations->unique('id');
        }

        return response()->json(['status'=>404, 'message'=>'There is no results.']);
        
    }
}
