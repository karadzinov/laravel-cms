<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $guarded = [];

    public function scopeActive($query){
    	
    	return $query->where('active', '=', 1);
    }
}
