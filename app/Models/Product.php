<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\{ImagesPaths, HasYoutubeVideos};

class Product extends Model
{
    use HasYoutubeVideos;

    protected $table = 'products';

    public function category(){
    	
		return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function author(){
    	
		return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getReductedPriceAttribute(){
    	
    	return  $this->price - ($this->price*$this->reduction/100);
    }

    public function getThumbnailPathAttribute(){
        
        return asset('/images/products/thumbnails/' . $this->main_image);
    }

    public function getMediumPathAttribute(){
        
        return asset('/images/products/medium/' . $this->main_image);
    }

    public function getOriginalPathAttribute(){
        
        return asset('/images/products/originals/' . $this->main_image);
    }
}
