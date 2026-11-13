<?php

namespace App\Support;

use GuzzleHttp\Exception\ConnectException;
use Throwable;

class FalloServicio
{
    public static function esConexion(Throwable $e): bool
    {
        while ($e) {
            if ($e instanceof ConnectException) {
                return true;
            }

            $e = $e->getPrevious();
        }

        return false;
    }

    public static function respuesta($request)
    {
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'message' => 'No fue posible conectar con el servicio.',
            ], 503);
        }

        return response()->view('db_conexion', [], 503);
    }
}
