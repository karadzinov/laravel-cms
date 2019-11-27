<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\{Imageable, HasYoutubeVideos, ModelIsTranslatable, Taggable};

class Product extends Model
{
    use Imageable, HasYoutubeVideos, ModelIsTranslatable, Taggable;

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

    public function getFormatedPriceAttribute(){
        
        return number_format($this->price, 2, '.', ' ');
    }

    public function getReductedPriceAttribute(){
    	
    	return  round($this->price - ($this->price*$this->reduction/100), 2);
    }

    public function getFormatedCurrentPriceAttribute(){
        
        if($this->reduction){
            return number_format($this->reductedPrice, 2, '.', ' ');
        }

        return $this->formatedPrice;
    }

    public function getShowRouteAttribute(){
        
        return route('products.show', $this->slug);
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

    public function getOriginalAttribute(){
        
        return $this->getOriginalPathAttribute() . $this->main_image;
    }

    public function getThumbnailAttribute(){
        
        return $this->getThumbnailPathAttribute() . $this->main_image;
    }

    public function reviews(){
        
        return $this->hasMany(Review::class, 'product_id', 'id');
    }

    public function getRatingAttribute(){
        
        $ratings = $this->reviews->pluck('rating')->toArray();

        if(!count($ratings)) return 0;

        return round(array_sum($ratings)/count($ratings));
    }
}
