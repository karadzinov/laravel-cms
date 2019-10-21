<?php

namespace App\Models;

use App\Models\Helpers\ImagesPaths;
use Illuminate\Database\Eloquent\Model;
	
class Partner extends Model
{
	use ImagesPaths;
	
    protected $table = 'partners';
    protected $guarded = [];
}
