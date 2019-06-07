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
	            $paths = $this->makePaths($request->get('table'));
	            $this->makeDirectories($paths);
	            
	            $imageName = $image->getClientOriginalName();
	            $image->move($paths->originals, $imageName);
	            $findimage = $paths->originals . $imageName;
	            $imagethumb = InterventionImage::make($findimage)->resize(200, null, function ($constraint) {
	                $constraint->aspectRatio();
	            });
	            $imagemedium = InterventionImage::make($findimage)->resize(600, null, function ($constraint) {
	                $constraint->aspectRatio();
	            });
	            $imagethumb->save($paths->thumbnails . $imageName);
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
			$paths = $this->makePaths($request->get('table'));
			$image = $request->name;
			if($request->get('model')){
				$model = $request->get('model');
				$model = $model::findOrFail($request->get('id'));
				$modelImage = $model->images()->where('name', '=', $image)->first();
				
				($modelImage) ? $modelImage->delete() : null;
			}

			@unlink($paths->originals . $image);
			@unlink($paths->thumbnails . $image);
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
        $originals = $basePath . '/originals/';
        $thumbnails = $basePath . '/thumbnails/';
        $medium = $basePath . '/medium/';
        $paths = (object) compact('originals', 'thumbnails', 'medium');

        return $paths;
    }

    public function makeDirectories($paths){
    	
    	File::makeDirectory($paths->originals, $mode = 0755, true, true);
        File::makeDirectory($paths->thumbnails, $mode = 0755, true, true);
        File::makeDirectory($paths->medium, $mode = 0755, true, true);
    }
}
