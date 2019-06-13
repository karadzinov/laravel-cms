<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Helpers\Imageable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    use Imageable;

    protected $table = 'pages';
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];
    
    public function getShowRouteAttribute(){
    	
    	return route('pages.show', [$this->id, Str::slug(strip_tags($this->title))]);
    }
}
