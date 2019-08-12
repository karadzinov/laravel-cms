<?php

namespace App\Http\View\Composers;

use App\Models\Language;
use Illuminate\View\View;

class AdminNavComposer
{
    protected $categories;
    protected $pages;

    public function __construct()
    {
        $languages = Language::where('active','=','1')
                        ->select('code','name')
                        ->get();
                        
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
            'languages' => $this->languages,
        ]);
    }
}