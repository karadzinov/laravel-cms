<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Purchase;

class ViewOnlyMyPurchase
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
        $purchase = Purchase::findOrFail($request->purchase);
        if($purchase->user_id == auth()->user()->id && !$purchase->completed){
            return $next($request);
        }

        return redirect()->back()->with('error', 'ohhh sorry ohhh');
    }
}
