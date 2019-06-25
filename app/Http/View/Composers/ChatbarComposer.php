<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ChatbarComposer
{
    protected $conversations;

    public function __construct()
    {
        $this->conversations = Auth::user()->conversations()->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('conversations', $this->conversations);
    }
}