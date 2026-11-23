<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use App\Support\RedirectReplace;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Evita que un usuario con sesión activa vea login / recuperar clave.
     * Usa location.replace (no 302) para no re-apilar login en el historial
     * cuando el usuario pulsa “atrás” varias veces.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (session('sesion_iniciada') && session('api_jwt_token')) {
            return RedirectReplace::to(url(RouteServiceProvider::HOME));
        }

        $response = $next($request);

        if ($response instanceof Response) {
            $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', '0');
        }

        return $response;
    }
}
