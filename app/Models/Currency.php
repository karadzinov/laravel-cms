<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';

    protected $guarded = [];

    public function settings(){
    	
    	return $this->hasMany(Settings::class, 'currency_id', 'id');
    }
}
