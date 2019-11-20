<?php

namespace App\Http\Controllers;

use Auth;
use App\Helpers\Metadata\Metadata;
use App\Models\{About, Category, Settings, Partner, Post, Slide, Testimonial};

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->take(4)->get();
        $settings = Settings::first();
        $categories = Category::where('name', '!=', 'posts')->where('name', '!=', 'products')->take(3)->get();
        $testimonials = Testimonial::take(4)->get();
        $about = About::first();
        $partners = Partner::all();
        $slides = Slide::where('active', '=', 1)->orderBy('position')->get();
        $metadata = new Metadata(trans('general.navigation.home'));
        return view($this->path . 'home', compact('posts', 'settings', 'categories', 'testimonials', 'about', 'partners', 'slides'));
    }
}
