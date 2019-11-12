<?php

namespace App\Http\Controllers\Helpers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

trait HasTags{

	public function updateTags($post, $tags){
	    
	    $alreadyExistingTags = Tag::all();
	    $postTags = $post->tags()->pluck('id')->toArray();
	    $difference = array_merge(array_diff($postTags, $tags), array_diff($tags, $postTags));
	    
	    foreach($difference as $differentTag){
	        if(in_array($differentTag, $postTags)){
	            $post->tags()->detach($differentTag);
	        }else{
	            $newTag = $alreadyExistingTags->find($differentTag);
	            if(!$newTag){
	                $slug = Str::slug(strip_tags($differentTag));
	                $newTag = Tag::create(['language'=>App::getLocale(), 'name'=>$differentTag, 'slug' => $slug]);
	            }

	            try {
	                $post->tags()->attach($newTag->id);
	            } catch (Exception $e) {
	               continue;
	            }
	        }
	    }

	    return;
	}
}