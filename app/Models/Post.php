<?php

namespace App\Models;

use Illuminate\Support\Str;
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

    public function getThumbnailPathAttribute(){
    	
    	return asset('/images/posts/thumbnails/' . $this->image);
    }

    public function getMediumPathAttribute(){
        
        return asset('/images/posts/medium/' . $this->image);
    }

    public function getOriginalPathAttribute(){
        
        return asset('/images/posts/originals/' . $this->image);
    }

    public function getVideoIdAttribute(){
        
        if($this->video)
        {
            try {
                $components = parse_url($this->video);
                parse_str($components['query'], $params);
                
                $id = $params['v'];
                
                return $id;
            } catch (Exception $e) {
                
                return false;
            }
        }

        return false;
    }

    public function getVideoPreviewImageAttribute(){
        if($this->video)
        {
            try {
                $id = $this->videoId;
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

        //update $view and $route when front is made
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

    public function getShowRouteAttribute(){
        
        return route('posts.show', [$this->id, Str::slug(strip_tags($this->title))]);
    }
}
