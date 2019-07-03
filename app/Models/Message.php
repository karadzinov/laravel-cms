<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages";

    protected $dates = ['created_at', 'updated_at'];

    public function user(){
    	
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function conversation(){
    	
    	return $this->belongsTo(Conversation::class, 'conversation_id', 'id');
    }

    public function users(){
        
        return $this->belongsToMany(User::class, 'message_user', 'message_id', 'user_id');
    }

    public function seen(){
        $auth = Auth::user();
        if($auth->id == $this->user_id){
            return true;
        }
        return $this->users->contains($auth);
    }
}
