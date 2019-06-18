<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
    	
    	$posts = Post::latest()->where('workflow', '=', 'posted')->get();
    	$slider = $posts->where('image', '!=', null)->take(4);

    	return view('user/posts/index', compact('posts', 'slider'));
    }

    public function show(Post $post){
    	
    	return view('user/posts/show', compact('post'));
    }
}
