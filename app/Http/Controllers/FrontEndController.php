<?php

namespace App\Http\Controllers;

use App;
use Exception;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Helpers\Metadata\Metadata;
use Illuminate\Support\Facades\Cookie;
use App\Models\{About, Category, Faq, FaqCategory, Language, Page, Post, Tag, Testimonial, User};

class FrontEndController extends Controller
{
    public function categoriesAndPages($slug){
    	
    	$page = Page::where('slug', '=', $slug)->with('images')->first();

    	if($page){
            try {
                $image = optional($page->images)->first();
                $image = $page->mediumPath . $image->name;
            } catch (Exception $e) {
                $image = null;
            }

            $metadata = new Metadata($page->title, $page->subtitle, $image);
    		return view($this->path . 'pages/show', compact('page', 'metadata'));
    	}
        
        $category = Category::where('slug', '=', $slug)->with('parent', 'children')->firstOrFail();
        $postsCategory = Category::where('parent_id', '=', NULL)->where('name', '=', 'posts')->first();

        $type = $this->checkCategoryType($category, $postsCategory);
        if($type === 'posts'){
            $data = $this->preparePostsData($category);
        }else{
            $data = $this->prepareProductsData($category);
        }
        
		return view($this->path . 'categories/' . $type, $data);
    }

    public function preparePostsData($category){
        
        $posts = $this->getAllCategoryPosts($category);
        $slider = $posts->where('image', '!=', null)->take(4);
        $categories = Category::has('posts')->inRandomOrder()->take(6)->get();
        $recent = Post::latest()->where('workflow', '=', 'posted')->take(3)->get();
        $popular = Post::inRandomOrder()->take(3)->get();
        $metadata = new Metadata($category->name, $category->description, $category->thumbnailPath);

        return compact('category', 'posts', 'slider', 'categories', 'recent', 'popular', 'metadata');
    }

    public function prepareProductsData($category){

        $bestSellers = \DB::table('product_purchase')
                    ->leftJoin('products','products.id','=','product_purchase.product_id')
                    ->selectRaw('products.*, sum(product_purchase.quantity) total')
                    ->groupBy('product_purchase.product_id')
                    ->orderBy('total','desc')
                    ->take(3)
                    ->get();

        $topRated = \DB::table('reviews')
                    ->leftJoin('products','products.id','=','reviews.product_id')
                    ->selectRaw('products.*, count(reviews.rating) count, avg(reviews.rating) avg')
                    ->groupBy('products.id')
                    ->orderBy('avg','desc')
                    ->take(5)
                    ->get();
        $products = $this->getAllCategoryProducts($category);
        $cart = collect([]);
        $wishlist = collect([]);
        $metadata = new Metadata($category->name, $category->description, $category->thumbnailPath);
        $productsCategories = Category::with('descendants')->where('name', '=', 'products')->first()->descendants;

        if($productsCategories->count() < 5){
            $categories = $productsCategories;
        }else{
            $categories = $productsCategories->random(5);
        }
       
        if(auth()->user()){
           $user = auth()->user();
           $cart = $user->cart()->get();
           $wishlist = $user->wishlist()->get();

        }

        return compact('category', 'products', 'cart', 'wishlist', 'bestSellers', 'topRated', 'metadata', 'categories');
        
    }

    public function checkCategoryType($category, $postsCategory){

            if($category->parent_id == $postsCategory->id){

                return 'posts';
            }
            $parent = $category->parent;
            if($parent && $parent->hasParent()){
                $this->checkCategoryType($category->parent, $postsCategory);
            }

            return 'products';

    }

public function getAllCategoryPosts(Category $category){
            
        $posts = $category->posts()->with('author', 'tags')->latest()->where('workflow', '=', 'posted')->paginate(5);

        foreach($category->descendants as $child){
          $itsPosts = $child->posts()->with('author')->latest()->where('workflow', '=', 'posted')->paginate(5);

          if($itsPosts->isNotEmpty()){
            foreach($itsPosts as $post){
                $posts->push($post);
            }
          } 
        }

        return $posts;
    }

    public function getAllCategoryProducts(Category $category){
            
        $products = $category->products()->with('reviews')->latest()->paginate(5);

        foreach($category->descendants as $child){
          $itsproducts = $child->products()->latest()->paginate(5);

          if($itsproducts->isNotEmpty()){
            foreach($itsproducts as $product){
                $products->push($product);
            }
          } 
        }

        return $products;
    }

    public function posts(){
    	$posts = Post::latest()->where('workflow', '=', 'posted')->with('category', 'author')->paginate(8);
    	$slider = $posts->where('image', '!=', null)->take(4);
        $categories = Category::has('posts')->inRandomOrder()->take(6)->get();
        $recent = Post::latest()->where('workflow', '=', 'posted')->take(3)->get();
        $popular = Post::inRandomOrder()->take(3)->get();
        $metadata = new Metadata(trans('general.navigation.posts'));

    	return view($this->path . 'posts/index', compact('posts', 'slider', 'categories', 'popular', 'recent', 'metadata'));
    }

    public function postsShow($categorySlug, $slug){
    	
    	$post = Post::where('slug', '=', $slug)->firstOrFail();
    	$categories = Category::has('posts')->inRandomOrder()->take(6)->get();
        $recent = Post::latest()->where('workflow', '=', 'posted')->take(3)->get();
        $popular = Post::inRandomOrder()->take(3)->get();
        $metadata = new Metadata($post->title, $post->subtitle, $post->thumbnailPath);

    	return view($this->path . 'posts/show', compact('post', 'categories', 'popular', 'recent', 'metadata'));
    }

    public function pages(){
    	
    	$pages = Page::with('images')->paginate(8);
        $metadata = new Metadata(trans('general.navigation.pages'));

    	return view($this->path . 'pages/index', compact('pages', 'metadata'));
    }

    public function faqs(){
    	
    	$categories = FaqCategory::with('faqs')->has('faqs')->get();
        $metadata = new Metadata(trans('general.navigation.faq'));
        $data = ['categories'=>$categories, 'metadata' => $metadata];
        
        if($this->path == 'user/theme-2/'){

            $faqs = Faq::all()->shuffle();
            $data['faqs'] = $faqs;
        }

    	return view($this->path . 'faq/index', $data);
    }

    public function tagPosts($slug){
        $tag = Tag::with('posts', 'products')->where('slug', '=',$slug)->firstOrFail();
        $metadata = new Metadata('#'.$tag->name);
        $activeTab = 'posts';
        if(strpos(url()->previous(), 'products')!==false){
            $activeTab = 'products';
        }
        $data = compact('tag', 'activeTab', 'metadata');

        if($tag->products->isNotEmpty()){
            $cart = collect([]);
            $wishlist = collect([]);
            if(auth()->user()){
               $user = User::where('id', '=', auth()->user()->id)
                        ->first();
               $cart = $user->cart()->get();
               $wishlist = $user->wishlist()->get();

            }
            $data['cart'] = $cart;
            $data['wishlist'] = $wishlist;
        }

        return view($this->path . 'posts/tags', $data);
    }

    public function contact(){
        
        $metadata = new Metadata(trans('general.navigation.contact'));

       return view($this->path . 'contact', compact('metadata'));
    }

    public function about(){
        
       $about        = About::first();
       $testimonials = Testimonial::all();
       $metadata = new Metadata(trans('general.navigation.about'));
       
       return view($this->path . 'about', compact('about', 'testimonials', 'metadata'));
    }

    public function switchLanguage(Request $request){

        try {
            $locale = Language::where('native', '=', $request->get('language'))
                                ->firstOrFail()->code;
            $minutes = 60 * 24 * 60;
            Cookie::queue(Cookie::make('locale', $locale, $minutes));

            return redirect()->route('public.home');
        } catch (Exception $e) {
            
            return redirect()->back()->with('error', trans('admin.ops'));
        }
    }
}
