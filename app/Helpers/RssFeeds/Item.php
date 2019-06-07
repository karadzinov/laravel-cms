<?php

namespace App\Helpers\RssFeeds;

class Item{

	public $id;
	public $title;
	public $link;
	public $pubDate;
	public $creator;
	public $description;
	public $content;
	public $category;
	public $guid;


	public function __construct($id, $title, $link, $pubDate, $creator, $description, $content, $category, $guid){
		$this->id = $id;
		$this->title = $title;
		$this->link = $link;
		$this->pubDate = $pubDate;
		$this->creator = $creator;
		$this->description = $description;
		$this->content = $content;
		$this->category = $category;
		$this->guid = $guid;
	}
}