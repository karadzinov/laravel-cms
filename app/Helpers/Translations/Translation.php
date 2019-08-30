<?php

namespace App\Helpers\Translations;

class Translation{
	public $name;
	public $files;

	public function __construct($name, $files)
	{
		$this->name = $name;
		$this->files = $files;
	}
}