<?php

namespace App\Models;

use Illuminate\Support\Str;
use \Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use NodeTrait;
    
    //protected $guarded =[];
    
    protected $fillable = [
        'name', 'parent_id', 'image', 'description', 'link'
    ];

    public function posts(){
    	
		return $this->hasMany(Post::class, 'category_id', 'id'); 	
    }

    public function getShowRouteAttribute(){
        
        return route('categories.show', [$this->id, Str::slug(strip_tags($this->name))]);
    }
}