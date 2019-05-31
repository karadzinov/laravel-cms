<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $dates = ['created_at', 'updated_at'];

    public function parent(){
    	
    	return $this->morphTo('imageable');
    }
}
