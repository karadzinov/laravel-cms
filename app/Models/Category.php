<?php

namespace App\Models;

use Illuminate\Support\Str;
use \Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CategoryTranslationScope;
use App\Models\Helpers\ModelIsTranslatable;

class Category extends Model
{
    //
    // use NodeTrait, ModelIsTranslatable;
    use NodeTrait;
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CategoryTranslationScope);
    }
    
    //protected $guarded =[];
    
    protected $fillable = [
        'language', 'name', 'parent_id', 'image', 'description', 'link', 'slug'
    ];

    public function posts(){
    	
		return $this->hasMany(Post::class, 'category_id', 'id'); 	
    }

    public function getShowRouteAttribute(){
        
        return route('categories.pages.show', [Str::slug(strip_tags($this->name))]);
    }

    public function getThumbnailPathAttribute(){
        
        return asset('/images/categories/thumbnails/' . $this->image);
    }

    public function products(){
        
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    // public function translate($query){
        
    //     return $query->where('language', '=', App::getLocale());
    // }
}