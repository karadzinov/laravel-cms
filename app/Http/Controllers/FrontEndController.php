<?php

namespace App\Http\Controllers;

use App;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\{About, Category, FaqCategory, Language, Page, Post, Settings, Tag, Testimonial};

class FrontEndController extends Controller
{
    public function categoriesAndPages($slug){
    	
    	$page = Page::where('slug', '=', $slug)->first();

    	if($page){
    		return view($this->path . 'pages/show', compact('page'));
    	}

    	$category = Category::where('slug', '=', $slug)->firstOrFail();
    	$posts = $category->posts()->latest()->where('workflow', '=', 'posted')->get();
    	$slider = $posts->where('image', '!=', null)->take(4);

		return view($this->path . 'posts/index', compact('posts', 'slider'));
    }

    public function posts(){
    	$posts = Post::latest()->where('workflow', '=', 'posted')->get();
    	$slider = $posts->where('image', '!=', null)->take(4);

    	return view($this->path . 'posts/index', compact('posts', 'slider'));
    }

    public function postsShow($categorySlug, $slug){
    	
    	$post = Post::where('slug', '=', $slug)->firstOrFail();
    	
    	return view($this->path . 'posts/show', compact('post'));
    }

    public function pages(){
    	
    	$pages = Page::all();

    	return view($this->path . 'pages/index', compact('pages'));
    }

    public function faqs(){
    	
    	$categories = FaqCategory::with('faqs')->has('faqs')->get();

    	return view($this->path . 'faq/index', compact('categories'));
    }

    public function tagPosts($slug){
        $tag = Tag::where('slug', '=',$slug)->firstOrFail();
        $posts = $tag->posts()->get();
        $tag = $tag->name;

        return view($this->path . 'posts/tags', compact('posts', 'tag'));
    }

    public function contact(){
        
       $settings = Settings::first();

       return view($this->path . 'contact', compact('settings'));
    }

    public function about(){
        
       $about        = About::first();
       $settings     = Settings::first();
       $testimonials = Testimonial::all();
       
       return view($this->path . 'about', compact('about', 'settings', 'testimonials'));
    }

    public function switchLanguage(Request $request){

        try {
            $locale = Language::where('native', '=', $request->get('language'))
                                ->firstOrFail()->code;
            $minutes = 60 * 24 * 60;
            Cookie::queue(Cookie::make('locale', $locale, $minutes));

            return redirect()->back();
        } catch (Exception $e) {
            
            return redirect()->back()->with('error', trans('admin.ops'));
        }

    }
}
