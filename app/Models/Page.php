<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\{Imageable, ModelIsTranslatable};

class Page extends Model
{

    use Imageable, ModelIsTranslatable;

    protected $table = 'pages';
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];
    
    public function getShowRouteAttribute(){
    	
    	return route('categories.pages.show', [$this->slug]);
    }
}
