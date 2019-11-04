<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = "purchases";

    public function shipping(){
    	
    	return $this->hasOne(ShippingInformation::class, 'purchase_id', 'id');
    }

    public function products(){
    	
    	return $this->belongsToMany(Product::class, 'product_purchase', 'purchase_id', 'product_id')->withPivot('quantity', 'current_price');
    }

    public function getShowRouteAttribute(){
    	
    	return route('purchases.show', $this->id);
    }

    public function user(){
    	
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getTotalAttribute(){
        
        $total = 0;

        if($this->completed){
            foreach($this->products as $product){
                $total += $product->pivot->current_price * $product->pivot->quantity;
            }
        }else{
            foreach($this->products as $product){
                $total += $product->current_price * $product->pivot->quantity;
            }
        }
        return $total;
        return number_format($total, 1, '.', ' ');
    }
}
