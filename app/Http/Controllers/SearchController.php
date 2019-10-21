<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, FAQ, Page};
use App\Helpers\Metadata\Metadata;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchAjax(Request $request){
    	
    	$searchTerm = '%'.$request->get('search').'%';

    	$posts = $this->searchInPosts($searchTerm);
        $posts = $this->makeSearchMenuItems($posts, 'post');

    	$pages = $this->searchInPages($searchTerm);
        $pages = $this->makeSearchMenuItems($pages, 'page');

    	$faqs = $this->searchInFaqsForAjax($searchTerm);
        $faqs = $this->makeSearchMenuItems($faqs, 'faq');
        
        $count = count($posts) + count($pages) + count($faqs);
        $translations = $this->getTitlesTranslations($request->get('search'), $count);

        $items = compact('posts', 'pages', 'faqs', 'translations');

    	return $items;
    }

    public function search(Request $request){
        $search = $request->get('search');
        if(!$search){
            $posts = array();
            $pages = array();
            $faqs = array();
        }else{
            $searchTerm = '%'.$search.'%';
            
            $posts = $this->searchInPosts($searchTerm);
            $pages = $this->searchInPages($searchTerm);
            $faqs = $this->searchInFaqs($searchTerm);
        }
        $metadata = new Metadata(trans('general.search'));

        return view($this->path . 'search/index', compact('posts', 'pages', 'faqs', 'search'));

        
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

    public function getTitlesTranslations($term, $count){
        
        $translations = [
            'posts'          => trans('general.navigation.posts'),
            'pages'          => trans('general.navigation.pages'),
            'faqs'           => trans('general.navigation.faq'),
            'noResults'      => trans('general.no-results-for') . ' ' . $term,
            'total'          => trans('general.total-results', compact('count')),
        ];

        return $translations;
    }
}
