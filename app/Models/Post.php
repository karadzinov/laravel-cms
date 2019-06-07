<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];
    
    public function category(){
    	
    	return $this->belongsTo(Category::class, 'category_id', 'id');
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
}
