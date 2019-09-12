<?php

namespace App\Helpers\Metadata;

use App\Models\Settings;

class Metadata{
	
	public $title;
	public $description;
	public $image;

	public function __construct($title, $description=null, $image=null)
	{
		$this->title = $title;
		if(!$description){
			$this->description = Settings::first()->meta_description;

		}else{
			$this->description = $description;
		}
		if($image){
			$logo = Settings::select('logo')->first()->logo;
			$this->image = asset('images/settings/medium/'. $logo);
		}else{
			$this->image = $image;
		}
	}
}