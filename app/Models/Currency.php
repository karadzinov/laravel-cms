<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';

    protected $guarded = [];

    public function scopeSymbol($query){
    	
    	return $query->where('active', '=', 1)->pluck('symbol')->first();
    }
}
