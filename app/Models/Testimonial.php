<?php

namespace App\Models;

use App\Models\Helpers\ImagesPaths;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
	use ImagesPaths;
	
    protected $table = 'testimonials';
    protected $guarded = [];
}

