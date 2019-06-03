<?php

namespace App\Http\Controllers;

use File;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as InterventionImage;

class ImagesController extends Controller
{
	const SESSION_KEY = 'dropzone_images';

    public function store(Request $request){
    	if($request->ajax()){
	        if ($request->hasFile('file')) {
	            $image = $request->file('file')[0];
	            $paths = $this->makePaths($request->get('model'));
	            $this->makeDirectories($paths);
	            
	            $imageName = $image->getClientOriginalName();
	            $image->move($paths->original, $imageName);
	            $findimage = $paths->original . $imageName;
	            $imagethumb = InterventionImage::make($findimage)->resize(200, null, function ($constraint) {
	                $constraint->aspectRatio();
	            });
	            $imagemedium = InterventionImage::make($findimage)->resize(600, null, function ($constraint) {
	                $constraint->aspectRatio();
	            });
	            $imagethumb->save($paths->thumbnail . $imageName);
	            $imagemedium->save($paths->medium . $imageName);

	            $this->updateSession($imageName, $request);
	            return $imageName;
	        }
    	}
    }

    public function updateSession($imageName, $request){
    	$key = self::SESSION_KEY;

		if(!$request->session()->has($key)){
			$request->session()->put($key, []);
		}   
    	$request->session()->push($key, $imageName);
    }
    public function update(Image $image){
    	
    	return 'update';
    }

    public function delete(Request $request){
    	$key = self::SESSION_KEY;
		try {
			$paths = $this->makePaths($request->model);
			$image = $request->name;
			// $elementKey = array_search($image, Session::get($key));

			@unlink($paths->original . $image);
			@unlink($paths->thumbnail . $image);
			@unlink($paths->medium . $image);

			if($request->session()->has($key)){
			  foreach ($request->session()->get($key) as $imageKey => $imageName) {
			    if($imageName === $image){
			      Session::pull($key.'.'.$imageKey);
			      break;
			    }
			  }
			}

			return response()->json(200);
		} catch (Exception $e) {

			return response()->json(500);
		}
    }

    /**
     * Make paths for storing images.
     *
     * @return object
     */
    public function makePaths($model){
        $basePath = public_path() . '/images/'.$model;
        $original = $basePath . '/originals/';
        $thumbnail = $basePath . '/thumbnails/';
        $medium = $basePath . '/medium/';
        $paths = (object) compact('original', 'thumbnail', 'medium');

        return $paths;
    }

    public function makeDirectories($paths){
    	
    	File::makeDirectory($paths->original, $mode = 0755, true, true);
        File::makeDirectory($paths->thumbnail, $mode = 0755, true, true);
        File::makeDirectory($paths->medium, $mode = 0755, true, true);
    }
}
