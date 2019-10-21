<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\{Image, Post};

class FooterComposer
{
    protected $posts;
    protected $images;

    public function __construct()
    {
        $posts = Post::latest()->where('image', '!=', null)->take(3)->get();
        $images = Image::where('imageable_type', '=', 'App\Models\Page')->take(6)->get();
        $this->posts = $posts;
        $this->images = $images;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'posts' => $this->posts,
            'images' =>$this->images
        ]);
    }
}