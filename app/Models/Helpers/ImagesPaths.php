<?php

namespace App\Models\Helpers;

trait ImagesPaths{

	public function getThumbnailPathAttribute(){
		
		return asset('/images/'.$this->getTable().'/thumbnails/' . $this->image);
	}

	public function getMediumPathAttribute(){
	    
	    return asset('/images/'.$this->getTable().'/medium/' . $this->image);
	}

	public function getOriginalPathAttribute(){
	    
	    return asset('/images/'.$this->getTable().'/originals/' . $this->image);
	}

}