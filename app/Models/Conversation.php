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

        try {
            return asset('images/settings/thumbnails/'.Settings::first()->logo);
        } catch (\Exception $e) {
            
            return asset('assets/img/bg-slider.png');
        }
    }

    public function getTitleAttribute(){
        
        if($this->name){
            return $this->name;
        }else{
            $interlocutors = $this->interlocutors;
            $name = str_replace(['[', ']', '"'], '', $interlocutors->take(2)->pluck('name'));
            $name = str_replace(',', ', ', $name);
            if($interlocutors->count()>2){
                return $name . '...';
            }
            return $name;
        }
    }

    public function seen(){
        
        if(count($this->messages) && !$this->messages->last()->seen()){
            return true;
        }

        return false;
    }

}
