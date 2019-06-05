<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Pages\StorePageRequest;

class PagesController extends Controller
{

    const DROPZONE_SESSION_KEY = 'dropzone_images';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('website-pages/index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $session_key = self::DROPZONE_SESSION_KEY;
        $this->cleanSession();
        return view('website-pages/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $page = Page::create($request->all());
        $images = $this->updateImages($page, $request);

        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('website-pages/show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('website-pages/edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePageRequest $request, Page $page)
    {
        $page->update($request->all());
        $images = $this->updateImages($page, $request);
        return redirect()->route('pages.show', $page->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Page $page)
    {
        $images = $page->images;

        if($images){
            $paths = $this->makePaths();
            foreach($images as $image){
                @unlink($paths->original . $image->name);
                @unlink($paths->thumbnail . $image->name);
                @unlink($paths->medium . $image->name);
                $image->delete();
            }
        }
        $page->delete();

        return redirect()->route('pages.index');
    }

    public function makePaths(){
        $basePath = public_path() . '/images/pages/';

        $original = $basePath . 'originals/';
        $thumbnail = $basePath . 'thumbnails/';
        $medium = $basePath . 'medium/';

        $paths = (object) compact('original', 'thumbnail', 'medium');

        return $paths;
    }

    public function updateImages(Page $page, $request){
        
        $session_key = self::DROPZONE_SESSION_KEY;
        $paths = $this->makePaths();

        if($request->session()->has($session_key)){
            foreach($request->session()->get($session_key) as $key => $image){
                
                $image = $this->renameImage($key, $image, $request->get('title'), $paths);
                $page->images()->create([
                    'name'=> $image, 
                    'imageable_type'=>get_class($page),
                    'imageable_id' =>$page->id
                ]);
            }

            $request->session()->forget($session_key);
        }        
    }

    public function renameImage($key, $name, $title, $paths){
        $nameParts = explode('.', $name);
        $extension = $nameParts[count($nameParts)-1];
        $newName = $title.'-'.$key.'.'.$extension;

        $images = scandir($paths->original);

        if(in_array($newName, $images)){
            $newName = $this->makeNewName($key, $newName, $newName, $paths);
        }

        rename($paths->original . $name, $paths->original . $newName);
        rename($paths->thumbnail . $name, $paths->thumbnail . $newName);
        rename($paths->medium . $name, $paths->medium . $newName);

        return $newName;
    }

    public function makeNewName($key, $name, $title, $paths){
        
        $nameParts = explode('.', $name);
        $extension = $nameParts[count($nameParts)-1];
        $newName = $nameParts[0].'-'.$key.'.'.$extension;

        $images = scandir($paths->original);
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
}
