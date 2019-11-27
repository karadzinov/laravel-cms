<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\ModelIsTranslatable;

class Tag extends Model
{
    use ModelIsTranslatable;
    
	protected $guarded = [];
	
    public function getShowRouteAttribute(){
    	
    	return route('tagPosts', [$this->slug]);
    }

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    /**
     * Get all of the products that are assigned this tag.
     */
    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggable');
    }
}
