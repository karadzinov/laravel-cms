<?php

namespace App\Http\Controllers;


use App\Models\FAQ;
use Illuminate\Http\Request;
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
    	
    	return view('FAQ.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('FAQ.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQRequest $request)
    {
        //
        $faq = FAQ::create($request->all());

    	return redirect(route('faq.index'))
    			->with('success', 'Successifully Created FAQ.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $faq)
    {
        return view('FAQ/show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $faq)
    {
        return view('FAQ/edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(FAQ $faq, FAQRequest $request)
    {
        $faq->update($request->all());
    	
    	return redirect(route('faq.show', $faq->id))
    			     ->with('success', 'FAQ Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function delete(FAQ $faq)
    {
     $faq->delete();
    	
    	return redirect(route('faq.index'))
                    ->with('success', 'Successfully Deleted FAQ'); 
    }
}
