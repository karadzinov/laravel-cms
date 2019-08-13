<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\{FAQ, FaqCategory};
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\FAQ\FAQRequest;

class FAQsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = FAQ::all();
    	
    	return view('admin.FAQ.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FaqCategory::pluck('name', 'id')->toArray();

        return view('admin.FAQ.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQRequest $request)
    {
        $input = $request->all();
        $input['language'] = App::getLocale();

        $faq = FAQ::create($input);

    	return redirect(route('admin.faq.index'))
    			->with('success', 'Successifully Created FAQ.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show($faq)
    {
        $faq = FAQ::findOrFail($faq);
        return view('admin.FAQ/show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     
     * @return \Illuminate\Http\Response
     */
    public function edit($faq)
    {
        $faq = FAQ::findOrFail($faq);
        $categories = FaqCategory::pluck('name', 'id')->toArray();

        return view('admin.FAQ/edit', compact('faq', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update($faq, FAQRequest $request)
    {
        $faq = FAQ::findOrFail($faq);
        $input = $request->all();
        $input['language'] = App::getLocale();

        $faq->update($input);
    	
    	return redirect(route('admin.faq.index'))
    			     ->with('success', 'FAQ Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function delete($faq)
    {
        $faq = FAQ::findOrFail($faq);
        $faq->delete();
    	
    	return redirect(route('admin.faq.index'))
                    ->with('success', 'Successfully Deleted FAQ'); 
    }
}