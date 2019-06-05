<?php

namespace App\Models\Helpers;

use App\Models\Image;

trait Imageable{

	public function images(){
    	
    	return $this->morphMany(Image::class, 'imageable');
    }

    public function getThumbnailPathAttribute(){
    	
    	return asset('/images/'. $this->getTable() .'/thumbnails') . '/';
    }

    public function getMediumPathAttribute(){
    	
    	return asset('/images/'. $this->getTable() .'/medium') . '/';
    }

    public function getOriginalPathAttribute(){
    	
    	return asset('/images/'. $this->getTable() .'/original') . '/';
    }
}