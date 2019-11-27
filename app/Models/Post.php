<?php

namespace App\Models;

use App\Helpers\RssFeeds\Item;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\{HasYoutubeVideos, ImagesPaths, ModelIsTranslatable, Taggable};

class Post extends Model
{
    use ImagesPaths, HasYoutubeVideos, ModelIsTranslatable, Taggable;
    
    protected $table = 'posts';
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];
    
    public function category(){
    	
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function author(){
        
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function users(){
        
        return $this->belongsToMany(User::class, 'users_posts', 'post_id', 'user_id');
    }

    public function makeItem(){
        
        $title = strip_tags($this->title);
        $subtitle = strip_tags($this->subtitle);

        //update $view and $route when front is made
        $route = $this->showRoute;
        $view = view('admin/posts/rss-show', ['post'=>$this])->render();

        $item = new Item(
            $this->id,
            $title,
            $route,
            $this->created_at->format('D, d-M-y H:i:s'),
            $this->author->name,
            $subtitle,
            $view,
            $this->category->name,
            $route
        );

        return $item;
    }

    public function getShowRouteAttribute(){
        
        return route('posts.show', [$this->category->slug, $this->slug]);
    }
}
