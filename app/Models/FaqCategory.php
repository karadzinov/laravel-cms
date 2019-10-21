<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\ModelIsTranslatable;

class FaqCategory extends Model
{
	use ModelIsTranslatable;
	
    protected $table = 'faq_categories';

    protected $guarded = [];

    public function faqs(){
    	
    	return $this->hasMany(FAQ::class, 'category_id', 'id');
    }
}
