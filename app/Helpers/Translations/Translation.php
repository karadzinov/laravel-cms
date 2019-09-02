<?php

namespace App\Helpers\Translations;

use App\Models\Language;

class Translation{
	public $folder;
	public $files;
	public $name;

	public function __construct($folder, $files)
	{
		$this->folder = $folder;
		$this->name = $this->findInLanguagesTable($this->folder);
		$this->files = $files;
	}

	public function findInLanguagesTable($folder){
		
		$name = Language::where('code', '=', $folder)->first()->name;

		return $name;
	}
}