<?php

namespace App\Models;

use App\Helpers\RssFeeds\Item;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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

    public function getThumnailPathAttribute(){
    	
    	return asset('/images/posts/thumbnails/' . $this->image);
    }

    public function getVideoPreviewImageAttribute(){
        if($this->video)
        {
            try {
                $components = parse_url($this->video);
                parse_str($components['query'], $params);
                
                $id = $params['v'];
                $image = "https://img.youtube.com/vi/{$id}/hqdefault.jpg";
                
                return $image;
            } catch (Exception $e) {
                
                return false;
            }
        }

        return false;
    }

    public function makeItem(){
        
        $title = strip_tags($this->title);
        $subtitle = strip_tags($this->subtitle);
        $route = route('posts.show', [$this->id]);
        $view = view('posts/rss-show', ['post'=>$this])->render();
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
}
