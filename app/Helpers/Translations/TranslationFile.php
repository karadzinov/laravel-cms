<?php

namespace App\Helpers\Translations;

class TranslationFile{
	public $name;
	public $route;
	public $content;

	public function __construct($name, $route, $content = null)
	{
		$this->name = $name;
		$this->route = $route;
		$this->content = $content;
	}


}