<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Metadata\Metadata;
use Illuminate\Support\Facades\DB;
use App\Models\{Category, FAQ, Post, Product, Page, User};

class SearchController extends Controller
{
    public function searchAjax(Request $request){
    	
    	$searchTerm = '%'.$request->get('search').'%';

    	$posts = $this->searchInPosts($searchTerm);
        $posts = $this->makeSearchMenuItems($posts, 'post');

        $products = $this->searchInProducts($searchTerm);
        $products = $this->makeSearchMenuItems($products, 'product');

    	$pages = $this->searchInPages($searchTerm);
        $pages = $this->makeSearchMenuItems($pages, 'page');

    	$faqs = $this->searchInFaqsForAjax($searchTerm);
        $faqs = $this->makeSearchMenuItems($faqs, 'faq');
        
        $count = count($posts) + count($products) + count($pages) + count($faqs);
        $translations = $this->getTitlesTranslations($request->get('search'), $count);
        $items = compact('posts', 'products', 'pages', 'faqs', 'translations');

    	return $items;
    }

    public function search(Request $request){
        $search = $request->get('search');
        if(!$search){
            $posts = array();
            $products = array();
            $pages = array();
            $faqs = array();
        }else{
            $searchTerm = '%'.$search.'%';
            
            $posts = $this->searchInPosts($searchTerm);
            $products = $this->searchInProducts($searchTerm);
            $pages = $this->searchInPages($searchTerm);
            $faqs = $this->searchInFaqs($searchTerm);
        }
        $metadata = new Metadata(trans('general.search'));
        $data = compact('posts', 'products', 'pages', 'faqs', 'search');

        if($products->count()){
            
            $cart = collect([]);
            $wishlist = collect([]);
            if(auth()->user()){
               $user = User::where('id', '=', auth()->user()->id)
                        ->first();
               $cart = $user->cart()->get();
               $wishlist = $user->wishlist()->get();

            }

            $data['wishlist'] = $wishlist;
            $data['cart'] = $cart;
        }
        return view($this->path . 'search/index', $data);

        
    }

    public function searchInPosts($searchTerm){
    	
    	$posts = Post::where('title','LIKE',$searchTerm)
    		->orWhere('subtitle','LIKE',$searchTerm)
    		->orWhere('location', 'LIKE', $searchTerm)
    		->orWhere('main_text', 'LIKE', $searchTerm)
    		->get()
    		->where('workflow', '=', 'posted');

    		return $posts;
    }

    public function searchInProducts($searchTerm){
        
        $products = Product::where('name','LIKE',$searchTerm)
            ->orWhere('short_description','LIKE',$searchTerm)
            ->orWhere('description', 'LIKE', $searchTerm)
            ->get();

            return $products;
    }

    public function searchInPages($searchTerm){
    	
    	$pages = Page::where('title','LIKE',$searchTerm)
    		->orWhere('subtitle','LIKE',$searchTerm)
    		->orWhere('main_text', 'LIKE', $searchTerm)
    		->get();

    	return $pages;
    }

    public function searchInFaqs($searchTerm){
        $faqs = FAQ::where('question','LIKE',$searchTerm)
            ->where('question', 'LIKE', $searchTerm)
            ->orWhere('answer', 'LIKE', $searchTerm)
            ->get();

        return $faqs;
    }

    public function searchInFaqsForAjax($searchTerm){
    	$faqs = DB::table('faqs')
    	    ->where('question', 'LIKE', $searchTerm)
			->orWhere('answer', 'LIKE', $searchTerm)
    	    ->select('question as title')->get();

    	return $faqs;
    }

    public function makeSearchMenuItems($items, $type){
    	 if($items->isNotEmpty()){
    	 	foreach($items as $id => $item){
    	 		$title = $item->title ?? $item->name;
    	 		if($type !== 'faq'){
    	 			$route = $item->showRoute;
    	 		}else{
    	 			$route = route('faq.index');
    	 		}
    	 		$items[$id] = (object)compact('title', 'route', 'type');
    	 	}
    	 }

    	$items = $items->toArray();

    	return $items;
    }

    public function getTitlesTranslations($term, $count){
        
        $translations = [
            'posts'          => trans('general.navigation.posts'),
            'products'       => trans('general.navigation.products'),
            'pages'          => trans('general.navigation.pages'),
            'faqs'           => trans('general.navigation.faq'),
            'noResults'      => trans('general.no-results-for') . ' ' . $term,
            'total'          => trans('general.total-results', compact('count')),
        ];

        return $translations;
    }
}
