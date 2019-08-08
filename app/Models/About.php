<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\{HasYoutubeVideos, Imageable};

class About extends Model
{

    use HasYoutubeVideos, Imageable;

	protected $table = "about";
	protected $guarded = [];
}
