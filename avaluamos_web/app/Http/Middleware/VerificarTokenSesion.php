<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class VerificarTokenSesion
{
    public function handle($request, Closure $next)
    {
        $token = Session::get('api_jwt_token');

        if (! is_string($token) || $token === '' || $this->tokenVigente($token)) {
            return $next($request);
        }

        return $this->cerrarSesionExpirada($request, $next);
    }

    private function tokenVigente(string $token): bool
    {
        $partes = explode('.', $token);

        if (count($partes) !== 3) {
            return false;
        }

        $payload = strtr($partes[1], '-_', '+/');
        $payload .= str_repeat('=', (4 - strlen($payload) % 4) % 4);
        $datos = json_decode(base64_decode($payload, true), true);

        if (! is_array($datos) || ! isset($datos['exp'])) {
            return false;
        }

        return (int) $datos['exp'] > time();
    }

    private function cerrarSesionExpirada($request, Closure $next)
    {
        $mensaje = 'Se cerró la sesión por inactividad.';

        Session::flush();
        Session::put('sesion_expirada', $mensaje);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'message' => 'La sesión se cierra.',
                'sesion_expirada' => true,
            ], 401);
        }

        if ($request->routeIs('inicio', 'login.index', 'login_usuario')) {
            return $next($request);
        }

        return redirect()->route('inicio');
    }
}
