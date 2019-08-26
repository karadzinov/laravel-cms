<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\{ImagesPaths, ModelIsTranslatable};

class Slide extends Model
{
	use ImagesPaths, ModelIsTranslatable;

    protected $table = 'slides';
    protected $guarded = [];
}
