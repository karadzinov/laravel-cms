<?php

namespace App\Models\Helpers;
use Exception; 

trait HasYoutubeVideos{

    public function getVideoIdAttribute(){
        
        if($this->video)
        {
            try {
                $components = parse_url($this->video);
                parse_str($components['query'], $params);
                
                $id = $params['v'];
                
                return $id;
            } catch (Exception $e) {
                
                return false;
            }
        }

        return false;
    }

    public function getVideoPreviewImageAttribute(){
        if($this->video)
        {
            try {
                $id = $this->videoId;
                $image = "https://img.youtube.com/vi/{$id}/hqdefault.jpg";
                
                return $image;
            } catch (Exception $e) {
                
                return false;
            }
        }

        return false;
    }
	
    public function getVideoPreviewAttribute(){
        
        $iframe = '<iframe width="560" height="315" class="lazy" data-src="https://www.youtube.com/embed/'.$this->videoId.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

        return $iframe;
    }

    public function getVideoSrcAttribute(){
        
        return '//www.youtube.com/embed/' . $this->videoId;
    }
}