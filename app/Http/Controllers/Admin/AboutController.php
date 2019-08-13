<?php

namespace App\Http\Controllers\Admin;

use File;
use Exception;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Requests\UpdateAboutRequest;
use App\Http\Controllers\Helpers\UsesSlider;
use Intervention\Image\ImageManagerStatic as Image;

class AboutController extends UsesSlider
{
    /**
     * Parent classs method for creating strage path.
     *
     * @return string
     */
    public function getTable(){
        
        return 'about';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();

        return view('admin/about/index', compact('about'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/about/create');
    }

     public function store(/*UpdateAboutRequest*/Request $request)
    {   
        // $about = About::create($request->all());
        $image = $this->updateImageIfNecessary($request);
        $input = $request->all();
        $title = 'about';
        $input['image'] = $image;
        $input['language'] = App::getLocale();
        $about = About::create($input);
        
        $images = $this->updateImages($about, $request, $title);

        return redirect()->route('admin.about.show')
                    ->with('success', 'About Page Successfully Updated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    	$about = About::first();

        return view('admin/about/show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $this->cleanSession();
        $about = About::first();

        return view('admin/about/edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request)
    {	
    	$about = About::first();
        $image = $this->updateImageIfNecessary($request, $about);
        $input = $request->all();
        $title = 'about';
        $input['image'] = $image;
        $about->update($input);
        
        $images = $this->updateImages($about, $request, $title);

        return redirect()->route('admin.about.show')
                    ->with('success', 'About Page Successfully Updated.');
    }

    /**
     * Uploads the logo if there is any, and deletes previous one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Settings  $settings
     * @return string or null
     */

    public function updateImageIfNecessary(Request $request, About $about = null){
        
        if ($request->hasFile('image')) {
            if($about){
               $this->deleteImages($about);
            }


            $image = $request->file('image');
            $imageName = 'about.'.$request->image->getClientOriginalExtension();

            $paths = $this->makePaths();
            File::makeDirectory($paths->originals, $mode = 0755, true, true);
            File::makeDirectory($paths->thumbnails, $mode = 0755, true, true);
            File::makeDirectory($paths->medium, $mode = 0755, true, true);

            $image->move($paths->originals, $imageName);

            $findimage = $paths->originals . $imageName;
            $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagethumb->save($paths->thumbnails . $imageName);
            $imagemedium->save($paths->medium . $imageName);

            return $imageName;
        }elseif($about && $about->image){
            return $about->image;
        }

        return null;
    }

    /**
     * Deletes images.
     *
     * @param  Settings  $settings
     * @return bool
     */
    public function deleteImages(About $about){
        $paths = $this->makePaths();
        $image = $about->image;
        try {
            @unlink($paths->originals.$image);
            @unlink($paths->thumbnails.$image);
            @unlink($paths->medium.$image);

            return true;
        } catch (Exception $e) {
            
            return false;
        }
    }
}

