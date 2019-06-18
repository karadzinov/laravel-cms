<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $guarded = [];
	
    public function posts(){
    	
    	return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }

    public function getShowRouteAttribute(){
    	
    	return route('tagPosts', [$this->slug]);
    }
}
