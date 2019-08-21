<?php

namespace App\Http\Controllers;

use App;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\{About, Category, Faq, FaqCategory, Language, Page, Post, Settings, Tag, Testimonial};

class FrontEndController extends Controller
{
    public function categoriesAndPages($slug){
    	
    	$page = Page::where('slug', '=', $slug)->first();

    	if($page){
    		return view($this->path . 'pages/show', compact('page'));
    	}
        $category = Category::where('slug', '=', $slug)->with('descendants')->firstOrFail();
        $posts = $this->getAllCategoryPosts($category);
    	$slider = $posts->where('image', '!=', null)->take(4);
        $categories = Category::has('posts')->inRandomOrder()->take(6)->get();
        $recent = Post::latest()->where('workflow', '=', 'posted')->take(3)->get();
        $popular = Post::inRandomOrder()->take(3)->get();
        $facebook = Settings::first()->facebook;

		return view($this->path . 'categories/index', compact('category', 'posts', 'slider', 'categories', 'recent', 'popular', 'facebook'));
    }

    public function getAllCategoryPosts(Category $category){
            
        $posts = $category->posts()->latest()->where('workflow', '=', 'posted')->paginate(5);

        foreach($category->descendants as $child){
          $itsPosts = $child->posts()->latest()->where('workflow', '=', 'posted')->paginate(5);

          if($itsPosts->isNotEmpty()){
            foreach($itsPosts as $post){
                $posts->push($post);
            }
          } 
        }

        return $posts;
    }

    public function posts(){
    	$posts = Post::latest()->where('workflow', '=', 'posted')->paginate(8);
    	$slider = $posts->where('image', '!=', null)->take(4);
        $categories = Category::has('posts')->inRandomOrder()->take(6)->get();
        $recent = Post::latest()->where('workflow', '=', 'posted')->take(3)->get();
        $popular = Post::inRandomOrder()->take(3)->get();
        $facebook = Settings::first()->facebook;

    	return view($this->path . 'posts/index', compact('posts', 'slider', 'categories', 'popular', 'recent', 'facebook'));
    }

    public function postsShow($categorySlug, $slug){
    	
    	$post = Post::where('slug', '=', $slug)->firstOrFail();
    	$categories = Category::has('posts')->inRandomOrder()->take(6)->get();
        $recent = Post::latest()->where('workflow', '=', 'posted')->take(3)->get();
        $popular = Post::inRandomOrder()->take(3)->get();
        $facebook = Settings::first()->facebook;

    	return view($this->path . 'posts/show', compact('post', 'categories', 'popular', 'recent', 'facebook'));
    }

    public function pages(){
    	
    	$pages = Page::paginate(8);

    	return view($this->path . 'pages/index', compact('pages'));
    }

    public function faqs(){
    	
    	$categories = FaqCategory::with('faqs')->has('faqs')->get();
        $data = ['categories'=>$categories];
        
        if($this->path == 'user/theme-2/'){

            $faqs = Faq::all()->shuffle();
            $data['faqs'] = $faqs;
        }

    	return view($this->path . 'faq/index', $data);
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
