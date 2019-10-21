<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\{HasYoutubeVideos, Imageable};
use App\Models\Helpers\ModelIsTranslatable;
class About extends Model
{

    use HasYoutubeVideos, Imageable, ModelIsTranslatable;

	protected $table = "about";
	protected $guarded = [];
}
