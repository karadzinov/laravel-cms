<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class CheckIfParticipates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $conversation = $request->get('conversation');
        if($conversation){
            $conversation = Conversation::findOrFail($conversation);
            if($conversation->participants()->get()->contains(Auth::user())){
                return $next($request);
            }
        }
        abort(403);
    }
}
