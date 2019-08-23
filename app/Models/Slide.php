<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\ImagesPaths;

class Slide extends Model
{
	use ImagesPaths;

    protected $table = 'slides';
    protected $guarded = [];
}
