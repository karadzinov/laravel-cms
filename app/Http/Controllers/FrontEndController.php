<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{FAQ, Page, Post, Category};

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
    	
    	$faqs = FAQ::all();

    	return view('user/faq/index', compact('faqs'));
    }
}
