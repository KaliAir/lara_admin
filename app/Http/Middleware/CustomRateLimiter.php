<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomRateLimiter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $key = $request->ip().':'.$request->route()->getName();
        $maxAttempts = 3;
        $decayMinutes = 60;

        if (Cache::has($key)) {
            $attempts = Cache::get($key) + 1;

            if ($attempts > $maxAttempts) {
                return response()->json(['message' => 'Too many attempts, try again tomorrow.'], 429);
            }

            Cache::put($key, $attempts, $decayMinutes);
        } else {
            Cache::put($key, 1, $decayMinutes);
        }

        return $next($request);
        }
}
