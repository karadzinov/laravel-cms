<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class NavComposer
{
    protected $categories;

    public function __construct()
    {
        $categories = Category::all()->where('parent_id','=',NULL);
        $this->categories = $categories;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}