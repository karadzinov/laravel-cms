<?php

namespace App\Http\View\Composers;

use App\Models\Script;
use Illuminate\View\View;

class MasterComposer
{
    protected $scripts;

    public function __construct()
    {
        $scripts = Script::where('active', '=', true)->get();
        $this->scripts = $scripts;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('scripts', $this->scripts);
    }
}