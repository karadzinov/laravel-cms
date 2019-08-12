<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\{Category, Page};
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Helpers\UsesSlider;
use App\Http\Requests\Pages\StorePageRequest;

class PagesController extends UsesSlider
{
    /**
     * Parent classs method for creating strage path.
     *
     * @return string
     */
    public function getTable(){
        
        return 'pages';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('admin.website-pages/index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->cleanSession();
        return view('admin.website-pages/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $title = $request->get('title');
        $input = $request->all();
        $input['language'] = App::getLocale();

        $slug = Str::slug(strip_tags($title));

        if($this->slugExists($slug)){
            return redirect()->back()->with('error', 'There is a page or a category with the same name.');
        }

        $input['slug'] = $slug;
        $page = Page::create($input);
        $images = $this->updateImages($page, $request, $title);

        return redirect()->route('admin.pages.index')
                    ->with('success', 'Page Successfully Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('admin.website-pages/show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $this->cleanSession();
        return view('admin.website-pages/edit', compact('page'));
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
        $input = $request->all();
        $input['language'] = App::getLocale();
        
        $title = $request->get('title');
        $slug = Str::slug(strip_tags($title));
        if($this->slugExists($slug, $page->id)){
            return redirect()->back()->with('error', 'There is a page or a category with the same name.');
        }
        $input['slug'] = $slug;

        $page->update($input);
        
        $images = $this->updateImages($page, $request, $title);

        return redirect()->route('admin.pages.index')
                    ->with('success', 'Page Successfully Updated.');
    }

    public function slugExists($slug, $id=null){
        
        $page = Page::where('slug', '=', $slug)
                    ->where('id', '!=', $id)
                    ->first();

        $category = Category::where('slug', '=', $slug)
                    ->where('id', '!=', $id)
                    ->first();

        if($category || $page){
            return true;
        }

        return false;
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
            $this->removeImages($images);
        }

        $page->delete();

        return redirect()->route('admin.pages.index')
                ->with('success', 'Page Successfully Deleted.');
    }

    
}
