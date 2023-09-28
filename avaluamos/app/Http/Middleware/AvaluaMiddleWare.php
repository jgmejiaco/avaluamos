<?php

namespace App\Http\Middleware;

use Closure;

class AvaluaMiddleWare
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
        // dd($request);
        if ($request->user() == null) {
            abort(403);
        }
        return $next($request);
    }
}
