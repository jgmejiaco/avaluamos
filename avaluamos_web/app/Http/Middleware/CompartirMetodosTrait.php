<?php

namespace App\Http\Middleware;

use App\Traits\MetodosTrait;
use Closure;

class CompartirMetodosTrait
{
    use MetodosTrait;

    public function handle($request, Closure $next)
    {
        if (session('sesion_iniciada') && session('api_jwt_token')) {
            $this->shareData();
        }

        return $next($request);
    }
}
