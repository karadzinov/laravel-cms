<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\ModelIsTranslatable;

class FAQ extends Model
{
	use ModelIsTranslatable;
	
    protected $table = 'faqs';
    protected $guarded = [];
    protected $dates = ['created_at'. 'updated_at'];

    public function category(){
    	
    	return $this->belongsTo(FaqCategory::class, 'category_id', 'id');
    }
}
