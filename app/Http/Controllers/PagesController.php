<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
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

        return view('website-pages/index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $title = $request->get('title');
        $images = $this->updateImages($page, $request, $title);

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
        $this->cleanSession();
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
        $title = $request->get('title');
        $images = $this->updateImages($page, $request, $title);

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
            $this->removeImages($images);
        }

        $page->delete();

        return redirect()->route('pages.index');
    }

    
}
