<?php

namespace App\Http\Controllers\Helpers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

trait Taggable{

	public function updateTags(Model $model, $tags){
	    
	    $alreadyExistingTags = Tag::all();
	    $modelsTags = $model->tags()->pluck('tag_id')->toArray();
	    $difference = array_merge(array_diff($modelsTags, $tags), array_diff($tags, $modelsTags));
	    
	    foreach($difference as $differentTag){
	        if(in_array($differentTag, $modelsTags)){
	            $model->tags()->detach($differentTag);
	        }else{
	            $newTag = $alreadyExistingTags->find($differentTag);
	            if(!$newTag){
	                $slug = Str::slug(strip_tags($differentTag));
	                $newTag = Tag::create(['language'=>App::getLocale(), 'name'=>$differentTag, 'slug' => $slug]);
	            }

	            try {
	                $model->tags()->attach($newTag);
	            } catch (Exception $e) {
	               continue;
	            }
	        }
	    }

	    return;
	}

	/**
	 * Finds assignedTags ids.
	 */
	public function assignedTags(Model $model){
	    if($model->tags->isNotEmpty()){
	        $assignedTags = $model->tags()->get()->pluck('id')->toArray();

	        return $assignedTags;
	    }else{

	        return false;
	    }
	}
}