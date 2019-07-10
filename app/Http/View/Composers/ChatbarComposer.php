<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class ChatbarComposer
{
    protected $conversations;

    public function __construct()
    {   $public = Conversation::where('public', '=', 1)->first();
        $conversations = Auth::user()->conversations()->get();
        $conversations = $conversations->sortByDesc(function($c){
            return optional($c->messages->last())->created_at;
        });
        $conversations->push($public);
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