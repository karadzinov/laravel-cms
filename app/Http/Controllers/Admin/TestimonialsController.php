<?php

namespace App\Http\Controllers\Admin;

use File;
use Exception;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\Testimonials\{StoreTestimonialRequest, UpdateTestimonialRequest};

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin/testimonials/index', compact('testimonials'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($testimonial)
    {
        $testimonial = Testimonial::findOrFail($testimonial);

        return view('admin/testimonials/show', 
                compact('testimonial')
            );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin/testimonials/create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {
        $image = $this->updateImageIfNecessary($request);
        $input = $request->all();
        $input['language'] = App::getLocale();

        $input['title'] = strip_tags($request->get('title'));
        $input['content'] = strip_tags($request->get('content'));
        $input['image'] = $image;
        $testimonial = Testimonial::create($input);

        return redirect()->route('admin.testimonials.index')
                ->with('success', trans('testimonials.success.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($testimonial)
    {
        $testimonial = Testimonial::findOrFail($testimonial);

        return view('admin/testimonials/edit', 
                compact('testimonial')
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, $testimonial)
    {
        $testimonial = Testimonial::findOrFail($testimonial);
        $image = $this->updateImageIfNecessary($request, $testimonial);
        
        $input = $request->all();
        $input['language'] = App::getLocale();
        $input['title'] = strip_tags($request->get('title'));
        $input['content'] = strip_tags($request->get('content'));
        $input['image'] = $image;

        $testimonial->update($input);

        return redirect()->route('admin.testimonials.index')
                ->with('success', trans('testimonials.success.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($testimonial)
    {
        $testimonial = Testimonial::findOrFail($testimonial);
        $this->deleteImages($testimonial);
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
                ->with('success', trans('testimonials.success.deleted'));
    }
    /**
     * Uploads the logo if there is any, and deletes previous one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return string or null
     */
    public function updateImageIfNecessary(Request $request, Testimonial $testimonial=null){
        if ($request->hasFile('image')) {
            if($testimonial && $testimonial->image){
               $this->deleteImages($testimonial);
            }
            $image = $request->file('image');
            $slugname = Str::slug(strip_tags($request->name));
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
        }elseif($testimonial && $testimonial->image){
            
            return $testimonial->image;
        }

        return null;
    }
    /**
     * Deletes images.
     *
     * @param  Settings  $settings
     * @return bool
     */
    public function deleteImages(Testimonial $testimonial){
        $paths = $this->makePaths();
        $image = $testimonial->image;
        try {
            @unlink($paths->original.$image);
            @unlink($paths->thumbnail.$image);
            @unlink($paths->medium.$image);
            return true;
        } catch (Exception $e) {
            
            return false;
        }
    }
    /**
     * Make paths for storing images.
     *
     * @return object
     */
    public function makePaths(){
        
        $original = public_path() . '/images/testimonials/originals/';;
        $thumbnail = public_path() . '/images/testimonials/thumbnails/';
        $medium = public_path() . '/images/testimonials/medium/';
        $paths = (object) compact('original', 'thumbnail', 'medium');
        
        return $paths;
    }
}

