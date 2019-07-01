<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function delete(Conversation $conversation){
        
        dd('delete');
    }
}
