<?php

namespace App\Http\Responsable\cliente_potencial;

use App\Models\Cliente;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ClienteVerificarCorreo implements Responsable
{
    public function toResponse($request)
    {
        $cliCorreo = trim((string) request('cliCorreo', ''));

        if ($cliCorreo === '') {
            return response()->json('correo_vacio');
        }

        try {
            $existeCorreo = Cliente::whereRaw('LOWER(cli_email) = ?', [strtolower($cliCorreo)])->exists();

            if ($existeCorreo) {
                return response()->json('existe_correo');
            }

            return response()->json('no_existe_correo');

        } catch (Exception $e) {
            return response()->json('error_exception');
        }
    }
}
