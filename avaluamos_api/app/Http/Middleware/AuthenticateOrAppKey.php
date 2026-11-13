<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class AuthenticateOrAppKey
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $guard = null)
    {
        $apiKeyLocal = (string) config('services.app_key');
        $apiKeyEnviada = (string) $request->header('X-App-Api-Key');

        if ($apiKeyLocal !== '' && hash_equals($apiKeyLocal, $apiKeyEnviada)) {
            return $next($request);
        }

        if ($this->auth->guard($guard)->guest()) {
            return response()->json([
                'error' => 'No autorizado.',
            ], 401);
        }

        return $next($request);
    }
}
