<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $table = 'faq_categories';

    protected $guarded = [];

    public function faqs(){
    	
    	return $this->hasMany(FAQ::class, 'category_id', 'id');
    }
}
