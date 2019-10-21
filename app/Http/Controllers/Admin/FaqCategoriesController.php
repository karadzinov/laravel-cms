<?php

namespace App\Http\Controllers\Admin;

use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use  App\Http\Requests\FAQ\FAQCategoryRequest;

class FAQCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FaqCategory::all();

        return view('admin/FAQCategories/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/FAQCategories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQCategoryRequest $request)
    {
        $input = $request->all();
        $input['language'] = App::getLocale();

        $category = FAQCategory::create($input);
       
        return redirect()->route('admin.faq-categories.index')
                ->with('success', trans('faq-categories.success.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $category = FaqCategory::findOrFail($category);
        return view('admin/FAQCategories/show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $category = FaqCategory::findOrFail($category);
        return view('admin/FAQCategories/edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function update(FAQCategoryRequest $request, $category)
    {
        $category = FaqCategory::findOrFail($category);
        $input = $request->all();
        $input['language'] = App::getLocale();

        $category->update($input);

        return redirect()->route('admin.faq-categories.index')
                ->with('success', trans('faq-categories.success.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($category)
    {
        $category = FaqCategory::findOrFail($category);
        $category->delete();

        return redirect()->route('admin.faq-categories.index')
                ->with('success', trans('faq-categories.success.deleted'));
    }
}
