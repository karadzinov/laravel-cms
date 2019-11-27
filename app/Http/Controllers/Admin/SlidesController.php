<?php

namespace App\Http\Controllers\Admin;

use File;
use Exception;
use App\Models\Slide;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\Slides\{StoreSlideRequest, UpdateSlideRequest};

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$slides = Slide::orderBy('active', 'DESC')->orderBy('position')->paginate(25);

        return view('admin/slides/index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/slides/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlideRequest $request)
    {
        $request->merge(['active'=>$request->has('active')]);
    	$image = $this->updateImageIfNecessary($request);
    	$input = $request->all();
    	$input['image'] = $image;
    	$input['language'] = App::getLocale();
    	$slide = Slide::create($input);

        return redirect()->route('admin.slides.index')->with('success', trans('slides.success.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show($slide)
    {
    	$slide = Slide::findOrFail($slide);

        return view('admin/slides/show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($slide)
    {
    	$slide = Slide::findOrFail($slide);

        return view('admin/slides/edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlideRequest $request, $slide)
    {
        $request->merge(['active'=>$request->has('active')]);
		$slide = Slide::findOrFail($slide);
	    $image = $this->updateImageIfNecessary($request, $slide);
	    $input = $request->all();
	    $input['image'] = $image;
	    $input['language'] = App::getLocale();

	    $slide->update($input);

        return redirect()->route('admin.slides.index')->with('success', trans('slides.success.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function delete($slide)
    {
    	$slide = Slide::findOrFail($slide);
        $this->deleteImages($slide);
        $slide->delete();

        return redirect()->route('admin.slides.index')->with('success', trans('slides.success.deleted'));
    }

    /**
     * Uploads the logo if there is any, and deletes previous one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return string or null
     */
    public function updateImageIfNecessary(Request $request, Slide $slide=null){
        if ($request->hasFile('image')) {
            if($slide && $slide->image){
               $this->deleteImages($slide);
            }
            $image = $request->file('image');
            $slugname = Str::slug(strip_tags($request->title));
            $imageName = $slugname . '.' . $image->getClientOriginalExtension();;
            $paths = $this->makePaths();
            File::makeDirectory($paths->original, $mode = 0755, true, true);
            File::makeDirectory($paths->thumbnail, $mode = 0755, true, true);
            File::makeDirectory($paths->medium, $mode = 0755, true, true);
            $image->move($paths->original, $imageName);
            $findimage = $paths->original . $imageName;
            $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagethumb->save($paths->thumbnail . $imageName);
            $imagemedium->save($paths->medium . $imageName);
            
            return $imageName;
        }elseif($slide && $slide->image){
            
            return $slide->image;
        }

        return null;
    }

    /**
     * Deletes images.
     *
     * @param  Settings  $settings
     * @return bool
     */
    public function deleteImages(Slide $slide){
        $image = $slide->image;
        $paths = $this->makePaths();
        try {
            @unlink($paths->original.$image);
            @unlink($paths->thumbnail.$image);
            @unlink($paths->medium.$image);
            return true;
        } catch (Exception $e) {
            
            return false;
        }
    }

    public function changeOrder(){
        $slides = Slide::where('active', '=', 1)
                    ->select(['id', 'title', 'image'])
                    ->orderBy('position')
                    ->get();
        $view = view('admin/partials/slides/changeOrder', compact('slides'))->render();

        return response()->json(['status'=>200, 'view'=>$view]);
    }

    public function storeOrder(Request $request){
        $positions = json_decode($request->get('data'));

        try {
            for($i = 0; $i< count($positions); $i++){
                $slide = Slide::findOrFail($positions[$i]);
                $slide->position = $i+1;
                $slide->save();
            }

            return response()->json(['status'=>200]);
        } catch (Exception $e) {
            return $e->getMessage();
            return response()->json(['status'=>500]);
        }
    }

    /**
     * Make paths for storing images.
     *
     * @return object
     */
    public function makePaths(){
        
        $original = public_path() . '/images/slides/originals/';;
        $thumbnail = public_path() . '/images/slides/thumbnails/';
        $medium = public_path() . '/images/slides/medium/';
        $paths = (object) compact('original', 'thumbnail', 'medium');
        
        return $paths;
    }
}
