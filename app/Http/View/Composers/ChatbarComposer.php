<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ChatbarComposer
{
    protected $conversations;

    public function __construct()
    {
        $conversations = Auth::user()->conversations()->get();
        $conversations = $conversations->sortByDesc(function($c){
            return optional($c->messages->last())->created_at;
        });
        $this->conversations = $conversations->sortByDesc('public');
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