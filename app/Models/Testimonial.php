<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\{ImagesPaths, ModelIsTranslatable};

class Testimonial extends Model
{
	use ImagesPaths, ModelIsTranslatable;
	
    protected $table = 'testimonials';
    protected $guarded = [];
}

