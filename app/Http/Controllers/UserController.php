<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\{About, Category, Settings, Partner, Post, Testimonial};

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
        $categories = Category::take(3)->get();
        $testimonials = Testimonial::take(4)->get();
        $about = About::first();
        $partners = Partner::all();
        
        return view($this->path . 'home', compact('posts', 'settings', 'categories', 'testimonials', 'about', 'partners'));
    }
}
