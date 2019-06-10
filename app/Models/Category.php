<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use \Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    //
    use NodeTrait;
    
    //protected $guarded =[];
    
    protected $fillable = [
        'name',
        'parent_id',
        'image',
        'description',
        'link',
    ];

    public function posts(){
    	
		return $this->hasMany(Post::class, 'category_id', 'id'); 	
    }
}