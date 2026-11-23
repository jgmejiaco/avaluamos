<?php

namespace App\Http\Middleware;

use App\Support\Permisos;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! session('sesion_iniciada') || ! session('api_jwt_token')) {
            return redirect()->route('inicio');
        }

        $routeName = $request->route()?->getName();
        $permisos = app(Permisos::class);

        if (! $permisos->tienePermisoRuta($routeName)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->view('errores.permiso_modal', [
                    'mensaje' => 'No tienes permisos para realizar esta acción.',
                ], 403);
            }

            return response()->view('errores.permiso_general', [
                'mensaje' => 'No tienes permisos para realizar esta acción.',
            ], 403);
        }

        return $next($request);
    }
}
