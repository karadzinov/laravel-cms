<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\Settings;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\Settings\{StoreSettnigsRequest, UpdateSettingsRequest};

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $settings = Settings::first();
        
        return view('settings.index', compact('settings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Settings::count()){

            return view('settings.create');
        }

        return redirect('/meta/settings');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettnigsRequest $request)
    {
        $image = $this->updateImageIfNecessary($request);
        $input = $request->all();
        $input['logo'] = $image;

        Settings::create($input);
        
        return redirect('/meta/settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return redirect('/meta/settings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = Settings::firstOrFail();

        return view('settings.edit', compact('settings'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingsRequest $request, $id)
    {
        $settings = Settings::firstOrFail();
          
        $input = $request->all(); 
        
        $image = $this->updateImageIfNecessary($request, $settings);

        if($image){
            $input['logo'] = $image;
        }
        $settings->update($input);
        
         return redirect('/meta/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $settings = Settings::firstOrFail();
        
        $this->deleteImages($settings);
        
        $settings->delete();
        
        return redirect('/meta/settings');
    }

    /**
     * Uploads the logo if there is any, and deletes previous one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Settings  $settings
     * @return string or null
     */

    public function updateImageIfNecessary(Request $request, Settings $settings=null){
        
        if ($request->hasFile('logo')) {
            if($settings){
               $this->deleteImages($settings);
            }

            $image = $request->file('logo');
            $imageName = 'Logo_'.$request->logo->getClientOriginalName();

            $path = public_path() . '/images/settings/originals/';
            $pathThumb = public_path() . '/images/settings/thumbnails/';
            $pathMedium = public_path() . '/images/settings/medium/';
            $ext = $image->getClientOriginalExtension();


            $image->move($path, $imageName);

            $findimage = $path . $imageName;
            $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagethumb->save($pathThumb . $imageName);
            $imagemedium->save($pathMedium . $imageName);

            return $imageName;
        }

        return null;
    }

    /**
     * Deletes images.
     *
     * @param  Settings  $settings
     * @return bool
     */
    public function deleteImages(Settings $settings){
        
        try {
            @unlink(public_path()."/images/settings/originals/".$settings->logo);
            @unlink(public_path()."/images/settings/medium/".$settings->logo);
            @unlink(public_path()."/images/settings/thumbnails/".$settings->logo);

            return true;
        } catch (Exception $e) {
            
            return false;
        }
    }
}
