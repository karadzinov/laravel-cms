<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{About, Category, FaqCategory, Page, Post, Settings, Tag, Testimonial};

class FrontEndController extends Controller
{
    public function categoriesAndPages($slug){
    	
    	$page = Page::where('slug', '=', $slug)->first();

    	if($page){
    		return view('user/pages/show', compact('page'));
    	}

    	$category = Category::where('slug', '=', $slug)->firstOrFail();
    	$posts = $category->posts()->latest()->where('workflow', '=', 'posted')->get();
    	$slider = $posts->where('image', '!=', null)->take(4);

		return view('user/posts/index', compact('posts', 'slider'));
    }

    public function posts(){
    	$posts = Post::latest()->where('workflow', '=', 'posted')->get();
    	$slider = $posts->where('image', '!=', null)->take(4);

    	return view('user/posts/index', compact('posts', 'slider'));
    }

    public function postsShow($categorySlug, $slug){
    	
    	$post = Post::where('slug', '=', $slug)->firstOrFail();
    	
    	return view('user/posts/show', compact('post'));
    }

    public function pages(){
    	
    	$pages = Page::all();

    	return view('user/pages/index', compact('pages'));
    }

    public function faqs(){
    	
    	$categories = FaqCategory::with('faqs')->has('faqs')->get();

    	return view('user/faq/index', compact('categories'));
    }

    public function tagPosts($slug){
        $tag = Tag::where('slug', '=',$slug)->firstOrFail();
        $posts = $tag->posts()->get();
        $tag = $tag->name;

        return view('user/posts/tags', compact('posts', 'tag'));
    }

    public function contact(){
        
       $settings = Settings::first();

       return view('user/contact', compact('settings'));
    }

    public function about(){
        
       $about        = About::first();
       $settings     = Settings::first();
       $testimonials = Testimonial::all();
       
       return view('user/about', compact('about', 'settings', 'testimonials'));
    }
}
