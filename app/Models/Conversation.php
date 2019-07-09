<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversations';
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    public function messages(){
    	
    	return $this->hasMany(Message::class, 'conversation_id', 'id');
    }

    public function participants(){
    	
    	return $this->belongsToMany(User::class, 'conversation_user', 'conversation_id', 'user_id');
    }

    public function getInterlocutorsAttribute(){
        
        return $this->participants->where('id', '!=', Auth::user()->id);
    }

    public function getImageAttribute(){
        $participants = $this->participants;

        if(count($participants)===2){
            $user = $participants->where('id', '!=', Auth::user()->id)->first();
            
            return $user->image;
        }

        return asset('images/settings/thumbnails/'.Settings::first()->logo);
    }

}
