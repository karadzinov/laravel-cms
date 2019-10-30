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
    	
    	return $this->belongsToMany(Product::class, 'product_purchase', 'purchase_id', 'product_id');
    }
}
