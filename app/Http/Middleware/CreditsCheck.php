<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CreditsCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->credits > 0){
            return $next($request);
        }
        return redirect()->route('pricing');
    }
}
