<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\Partners\{StorePartnerRequest, UpdatePartnerRequest};

class PartnersController extends Controller
{
    public function index(){
    	
    	$partners = Partner::latest()->paginate(25);

    	return view('admin/partners/index', compact('partners'));
    }

    public function show($partner){
    	
    	$partner = Partner::findOrFail($partner);

    	return view('admin/partners/show', compact('partner'));
    }

    public function create(){
    	
    	return view('admin/partners/create');
    }

    public function store(StorePartnerRequest $request){
    	
        $image = $this->updateImageIfNecessary($request);
        $input = $request->all();
        $input['image'] = $image;
        $partner = Partner::create($input);

    	return redirect()->route('admin.partners.index')->with('success', 'YESSSS!!!');
    }

    public function edit($partner){
    	
    	$partner = Partner::findOrFail($partner);

    	return view('admin/partners/edit', compact('partner'));
    }

    public function update(UpdatePartnerRequest $request, $partner){
    	$partner = Partner::findOrFail($partner);
        $image = $this->updateImageIfNecessary($request, $partner);
        
        $input = $request->all();
        $input['image'] = $image;

        $partner->update($input);

    	return redirect()->route('admin.partners.index')->with('success', 'YESSSS!!!');
    }

    public function delete($partner){
 		$partner = Partner::findOrFail($partner);
        $this->deleteImages($partner);
        $partner->delete();

    	return redirect()->route('admin.partners.index')->with('success', 'YESSSS!!!');
    }

    /**
     * Uploads the logo if there is any, and deletes previous one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return string or null
     */
    public function updateImageIfNecessary(Request $request, Partner $partner=null){
        if ($request->hasFile('image')) {
            if($partner && $partner->image){
               $this->deleteImages($partner);
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
            $imagethumb = Image::make($findimage)->resize(137, 77, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagethumb->save($paths->thumbnail . $imageName);
            $imagemedium->save($paths->medium . $imageName);
            
            return $imageName;
        }elseif($partner && $partner->image){
            
            return $partner->image;
        }

        return null;
    }

    /**
     * Deletes images.
     *
     * @param  Settings  $settings
     * @return bool
     */
    public function deleteImages(Partner $partner){
        $paths = $this->makePaths();
        $image = $partner->image;
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
        
        $original = public_path() . '/images/partners/originals/';;
        $thumbnail = public_path() . '/images/partners/thumbnails/';
        $medium = public_path() . '/images/partners/medium/';
        $paths = (object) compact('original', 'thumbnail', 'medium');
        
        return $paths;
    }
}
