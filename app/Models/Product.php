<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\{Imageable, HasYoutubeVideos};

class Product extends Model
{
    use Imageable, HasYoutubeVideos;

    protected $table = 'products';

    public function category(){
    	
		return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function author(){
    	
		return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function purchases(){
        
        return $this->belongsToMany(Purchase::class, 'product_purchase', 'product_id', 'purchase_id');
    }

    public function getReductedPriceAttribute(){
    	
    	return  $this->price - ($this->price*$this->reduction/100);
    }

    public function getShowRouteAttribute(){
        
        return route('products.show', $this->id);
    }

    public function getCurrentPriceAttribute(){
        
        if($this->reduction){
            return $this->reductedPrice;
        }

        return $this->price;
    }

    public function carts(){
        
        return $this->belongsToMany(User::class, 'carts', 'product_id', 'user_id');
    }

    public function wishlists(){
        
        return $this->belongsToMany(User::class, 'wishlists', 'product_id', 'user_id');
    }

    public function getMediumAttribute(){
        
        return $this->getMediumPathAttribute() . $this->main_image;
    }

    public function getThumbnailAttribute(){
        
        return $this->getThumbnailPathAttribute() . $this->main_image;
    }
}
