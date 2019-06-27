<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversations';
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    public function messages(){
    	
    	return $this->belongsToMany(User::class, 'conversation_user_message', 'conversation_id', 'user_id')->withPivot(['message', 'created_at']);
    }

    public function participants(){
    	
    	return $this->belongsToMany(User::class, 'conversation_user', 'conversation_id', 'user_id');
    }

}
