<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use App\Models\About;
use App\Models\Category;
use App\Models\Settings;
use App\Models\Testimonial;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        $testimonials = Testimonial::all();
        $about = About::first();

        return view('user/home', compact('posts', 'settings', 'categories', 'testimonials', 'about'));
    }
}
