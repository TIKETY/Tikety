<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CountryFilter
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
        if(true){
           dd($request->ipinfo->country);
        }

        return $next($request);
    }
}
