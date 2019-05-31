<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];
    
    public function images(){
    	
    	return $this->morphMany(Image::class, 'imageable');
    }

}
