<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category){
    	$posts = $category->posts()->latest()->where('workflow', '=', 'posted')->get();
    	$slider = $posts->where('image', '!=', null)->take(4);

		return view('user/posts/index', compact('posts', 'slider'));
    }
}
