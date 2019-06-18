<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\{Category, Page};

class NavComposer
{
    protected $categories;
    private $pages;

    public function __construct()
    {
        $categories = Category::all()->where('parent_id','=',NULL);
        $pages = $this->preparePagesForNav();
        
        $this->categories = $categories;
        $this->pages = $pages;
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
            'categories' => $this->categories,
            'pages' => $this->pages,
        ]);
    }

    public function preparePagesForNav(){
        $pages = Page::pluck('title', 'id');
        foreach($pages as $id => $title){
            $showRoute = route('pages.show', [$id, Str::slug(strip_tags($title))]);
            $pages[$id] = (object) compact('title', 'showRoute');
        }

        return $pages;
    }
}