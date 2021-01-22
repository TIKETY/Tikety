<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PhoneIsVerified
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
        if (! $request->user()->PhoneIsVerified()) {
            $request->user()->verifyphone($request->user()->phone_number)->middleware('throttle:3,1440');
            return redirect()->route('verification_code', ['language'=>app()->getLocale()]);
        }

        return $next($request);
    }
}
