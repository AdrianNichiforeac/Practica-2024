<?php

namespace App\Http\Middleware;

use Closure;

class WhiteListMiddleware
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
        if($_SERVER['REMOTE_ADDR']!=env('WHITELIST') && $_SERVER['REMOTE_ADDR'] != env('WHITELIST2') && $_SERVER['REMOTE_ADDR'] != env('WHITELIST3') && $_SERVER['REMOTE_ADDR'] != env('WHITELIST4')){
            return false;
        }
        return $next($request);
    }
}
