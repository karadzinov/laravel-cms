<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\PublicMessageSent;
use App\Events\PrivateMessageSent;
use App\Events\ConversationCreated;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{Conversation, Message, User};
use App\Http\Requests\Chat\ChatMessageSentRequest;

class ConversationsController extends Controller
{
    public function sendMessage(ChatMessageSentRequest $request)
    {
        $id = $request->get('conversation');
        $user = Auth::user();
        $content = $request->get('message');
        $conversation = Conversation::findOrFail($id);
        
        $message = $this->makeAndBroadcastMessage($conversation, $user, $content);

       return response()->json(['status'=>200]);
    }

    public function makeAndBroadcastMessage(Conversation $conversation, User $user, $content){
        $newMessage = $this->saveMessage($user->id, $conversation->id, $content);
        $message = $this->makeMessage($user->name, $content, $conversation->id);

        if($conversation->public){
            broadcast(new PublicMessageSent($message, $conversation->id, $user->id));
        }else{
            broadcast(new PrivateMessageSent($message, $conversation->id, $user->id));
        }

        return $message;
    }

    public function changeName(Request $request){
        
        $conversation = Conversation::findOrFail($request->get('conversation'));

        return view('partials/admin/chat/changeName', ['name'=>$conversation->name]);
    }

    public function storeNewName(Request $request){
        try {
            $user = Auth::user();
            $name = $request->get('name');
            $conversation = Conversation::findOrFail($request->get('conversation'));
            $conversation->name = $name;
            $conversation->save();
            $content = trans('chat.just-changed', ['title' => $conversation->title]);
            $message = $this->makeAndBroadcastMessage($conversation, $user, $content);
            $message->name = $name;
            return json_encode($message);
        } catch (Exception $e) {
            abort(500);
        }
    }

    public function create(){
    	$users = User::with(['roles' => function($role){
    	    $role->where('name', 'admin');
    	}])->where('id', '!=', Auth()->user()->id)->get();

    	return view('partials/admin/chat/addNewConversation', compact('users'));
    }

    public function addNewParticipants(Request $request){
        $conversation = Conversation::findOrFail($request->get('conversation'));
        $existingParticipants = $conversation->participants
                                    ->pluck('id')->toArray();
        
        $users = User::with(['roles' => function($role){
            $role->where('name', 'admin');
            }])->whereNotIn('id', $existingParticipants)->get();

        return view('partials/admin/chat/addParticipants', compact('users'));
        
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
            $newMessage = $this->saveMessage($user->id, $conversation->id, $message);
    	}

        $data = $this->notifyNewcomersAndPrepareData($participants, $user, $conversation);

    	return response()->json($data);
    }

    public function storeNewParticipants(Request $request){
        
        $user = Auth::user();
        $conversation = Conversation::findOrFail($request->get('conversation'));
        $newParticipants = $request->get('participants');
        $names = [];

        foreach($newParticipants as $participant){

            try {
                $conversation->participants()->attach($participant);
                $participant = User::findOrFail($participant);
                $content = trans('chat.just-added', ['name'=>$participant->name]);
                $message = $this->makeAndBroadcastMessage($conversation, $user, $content);
                $names[] = $participant->name;
            } catch (Exception $e) {
            }
        }

        $this->notifyNewcomersAndPrepareData($newParticipants, $user, $conversation);

        return response()->json(['status' => 200]);

    }

    public function removeParticipants(Request $request){

        $conversation = Conversation::findOrFail($request->get('conversation'));
        $users = $conversation->participants->where('id', '!=', Auth::user()->id);
        
        return view('partials/admin/chat/removeParticipants', compact('users'));
    }

    public function deleteParticipants(Request $request){
        
        $names = [];
        $user = Auth::user();
        $participants = $request->get('participants');
        $conversation = Conversation::findOrFail($request->get('conversation'));

        foreach($participants as $participant){
            try {
                $conversation->participants()->detach($participant);
                $participant = User::findOrFail($participant);
                $content = trans('chat.just-removed', ['name' => $participant->name]);
                $message = $this->makeAndBroadcastMessage($conversation, $user, $content);
                $names[] = $participant->name;
            } catch (Exception $e) {
            }
        }

        return response()->json(['status' => 200]);
    }

    public function makeMessage($user, $content, $id){
        
        $now = Carbon::now();
        $time = $now->format("H:i");
        $date = $now->format("d M 'y");

        return (object)compact('content', 'user', 'time', 'date', 'id');
    }

    public function notifyNewcomersAndPrepareData($participants, $user, $conversation){
        
        $view = view('partials/admin/chat/contact', compact('conversation'))->render();
        $data = [
            'view' => $view,
            'conversationId' => $conversation->id
        ];

        foreach($participants as $participant){

            if($participant != $user->id){
                broadcast(new ConversationCreated($participant, $data));
            }
        }

        return $data;
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
        $conversationId = $conversation->id;

        return view('partials/admin/chat/history', 
                    compact('conversation', 'messages', 'next', 'conversationId')
                );
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
            $content = trans('chat.user-left', ['name'=>$user->name]);
            $message = $this->makeAndBroadcastMessage($conversation, $user, $content);
            
            return back()->with('success', trans('chat.success-removed'));
        }else{

            return response()->json(403);
        }
    }

    public function search(Request $request){

        $searchTerm = '%'.$request->get('search').'%';
        $userConversationsIds = Auth::user()->conversations()
                                ->pluck('conversation_id')->toArray();
        $public = Conversation::where('public', '=','1')->first()->id;
        array_unshift($userConversationsIds, $public);

        $conversations = Conversation::whereIn('id', $userConversationsIds)
                            ->where('name', 'LIKE', $searchTerm)
                            ->select('name', 'id')->get();

        $messages = Message::whereIn('conversation_id', $userConversationsIds)
                        ->where('content', 'LIKE', $searchTerm)
                        ->get();
        if($messages->isNotEmpty()){
            foreach($messages as $message){
                $conversation = $message->conversation()->first(['name', 'id']);
                $conversation->messageContent = $message->content;

                $conversations->push($conversation);
            }
        }

        if($conversations->isNotEmpty()){
            
            return $conversations->unique('id');
        }

        return response()->
                json(['status'=>404, 'message'=>'There is no results.']);
        
    }

    public function participants(Request $request){
        $id = $request->get('conversation');
        $conversation = Conversation::with('participants.profile')->findOrFail($id);
        if((bool)$request->get('public')){
            $admins = User::with(['roles' => function($role){
                        $role->where('name', 'admin');
                    }])->where('id', '!=', Auth()->user()->id)->get();
            $conversation->participants = $admins;
        }
        $participants = [];

        foreach($conversation->participants as $participant){
            $name = $participant->name;
            $image = $participant->image;
            $level = $participant->level() . ' level';
            $messagesNumber = $conversation->messages()
                            ->where('user_id', '=', $participant->id)
                            ->count();
            $participants[] = (object) compact('name', 'image', 'level', 'messagesNumber');
        }
        $participants = collect($participants);
        $participants = $participants->sortByDesc('messagesNumber')->toArray();
        
        return response()->json(array_values($participants));
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
}
