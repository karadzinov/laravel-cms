<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\ModelIsTranslatable;

class Tag extends Model
{
    use ModelIsTranslatable;
    
	protected $guarded = [];
	
    public function posts(){
    	
    	return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }

    public function products(){
        
        return $this->belongsToMany(Product::class, 'product_tag', 'tag_id', 'product_id');
    }
    
    public function getShowRouteAttribute(){
    	
    	return route('tagPosts', [$this->slug]);
    }
}
