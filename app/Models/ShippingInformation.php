<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingInformation extends Model
{
    protected $table = 'shipping_informations';

    public function purchase(){
    	
    	return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }
}
