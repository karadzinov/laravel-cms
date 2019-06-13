<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, FAQ, Page};
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){
    	
    	$searchTerm = '%'.$request->get('search').'%';

    	$posts = $this->searchInPosts($searchTerm);
    	$pages = $this->searchInPages($searchTerm);
    	$faqs = $this->searchInFaqs($searchTerm);

    	$items = array_merge($posts, $faqs, $pages);

    	return $items;
    }

    public function searchInPosts($searchTerm){
    	
    	$posts = Post::where('title','LIKE',$searchTerm)
    		->orWhere('subtitle','LIKE',$searchTerm)
    		->orWhere('location', 'LIKE', $searchTerm)
    		->orWhere('main_text', 'LIKE', $searchTerm)
    		->get()
    		->where('workflow', '=', 'posted');
    	$posts = $this->makeSearchMenuItems($posts, 'post');

    		return $posts;
    }

    public function searchInPages($searchTerm){
    	
    	$pages = Page::where('title','LIKE',$searchTerm)
    		->orWhere('subtitle','LIKE',$searchTerm)
    		->orWhere('main_text', 'LIKE', $searchTerm)
    		->get();
    	$pages = $this->makeSearchMenuItems($pages, 'page');

    	return $pages;
    }

    public function searchInFaqs($searchTerm){
    	$faqs = DB::table('faqs')
    	    ->where('question', 'LIKE', $searchTerm)
			->orWhere('answer', 'LIKE', $searchTerm)
    	    ->select('question as title')->get();
    	$faqs = $this->makeSearchMenuItems($faqs, 'faq');

    	return $faqs;
    }

    public function makeSearchMenuItems($items, $type){
    	 if($items->isNotEmpty()){
    	 	foreach($items as $id => $item){
    	 		$title = $item->title;
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
}
