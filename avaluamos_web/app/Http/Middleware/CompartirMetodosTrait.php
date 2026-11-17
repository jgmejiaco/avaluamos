<?php

namespace App\Http\Middleware;

use App\Traits\MetodosTrait;
use Closure;
use Illuminate\Support\Facades\Auth;

class CompartirMetodosTrait
{
    use MetodosTrait;

    public function handle($request, Closure $next)
    {
        if (Auth::check() && session('api_jwt_token')) {
            $this->shareData();
        }

        return $next($request);
    }
}
