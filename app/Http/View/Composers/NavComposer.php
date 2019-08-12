<?php

namespace App\Http\View\Composers;

use App\Models\Language;
use Illuminate\View\View;
use App\Models\{Category, Page};

class NavComposer
{
    protected $categories;
    protected $pages;

    public function __construct()
    {
        $categories = Category::all()->where('parent_id','=',NULL);
        $languages = Language::where('active','=','1')
                        ->select('code','name')
                        ->get();
                        
        $pages = $this->preparePagesForNav();
        $this->categories = $categories;
        $this->pages = $pages;
        $this->languages = $languages;
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
            'languages' => $this->languages,
        ]);
    }

    public function preparePagesForNav(){
        $pages = Page::pluck('title', 'slug');
        foreach($pages as $slug => $title){
            $showRoute = route('categories.pages.show', [$slug]);
            $pages[$slug] = (object) compact('title', 'showRoute');
        }

        return $pages;
    }
}