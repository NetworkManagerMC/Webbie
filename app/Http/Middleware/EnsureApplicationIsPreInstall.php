<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureApplicationIsPreInstall
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
        if (app('installed')) {
            return redirect()->intended();
        }

        return $next($request);
    }
}
