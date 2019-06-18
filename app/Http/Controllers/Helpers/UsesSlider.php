<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

abstract class UsesSlider extends Controller
{
	// to use this slider, implement Imageable trait in your Model and extend this class in Controller (follow PagesController exemple), include dropzone-config in your blades like in website-pages/create and edit blade

    const DROPZONE_SESSION_KEY = 'dropzone_images';

	abstract protected function getTable();

	/**
     * Makes routes for storing images
     *
     * @return obj
     */
	public function makePaths(){
	    $basePath = public_path() . '/images/'.$this->getTable().'/';

	    $originals = $basePath . 'originals/';
	    $thumbnails = $basePath . 'thumbnails/';
	    $medium = $basePath . 'medium/';

	    $paths = (object) compact('originals', 'thumbnails', 'medium');

	    return $paths;
	}

	/**
     * If there is images in session, it renames them by parent title, creates a relation and cleans the session
     *
     * @return \Illuminate\Http\Response
     */
	public function updateImages($parent, $request, $title){
	    
	    $session_key = self::DROPZONE_SESSION_KEY;
	    $paths = $this->makePaths();

	    if($request->session()->has($session_key)){
	        foreach($request->session()->get($session_key) as $key => $image){
	            
	            $image = $this->renameImage($key, $image, $title, $paths);
	            $parent->images()->create([
	                'name'=> $image, 
	                'imageable_type'=>get_class($parent),
	                'imageable_id' =>$parent->id
	            ]);
	        }

	        $request->session()->forget($session_key);
	    }

	    return;       
	}

	public function renameImage($key, $name, $title, $paths){
	    
	    $newName= $this->makeNewName($key, $name, $title, $paths);

	    rename($paths->originals . $name, $paths->originals . $newName);
	    rename($paths->thumbnails . $name, $paths->thumbnails . $newName);
	    rename($paths->medium . $name, $paths->medium . $newName);

	    return $newName;
	}

	public function makeNewName($key, $name, $title, $paths){

	    $title = explode('.', $title)[0];
	    $title = Str::slug(strip_tags($title));
	    $nameParts = explode('.', $name);
	    $extension = $nameParts[count($nameParts)-1];
	    $newName = $title.'-'.$key.'.'.$extension;

	    $images = scandir($paths->originals);
	    if(in_array($newName, $images)){
	        $newName = $this->makeNewName($key, $newName, $newName, $paths);
	    }

	    return $newName;
	}

	public function cleanSession(){
	    $session_key = self::DROPZONE_SESSION_KEY;
	    if(Session::has($session_key)){
	        Session::forget($session_key);
	    }

	    return;
	}

	public function removeImages($images){
		$paths = $this->makePaths();
		foreach($images as $image){
		    @unlink($paths->originals . $image->name);
		    @unlink($paths->thumbnails . $image->name);
		    @unlink($paths->medium . $image->name);
		    $image->delete();
		}
		return;
	}
}