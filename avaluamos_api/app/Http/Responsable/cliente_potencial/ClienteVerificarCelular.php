<?php

namespace App\Http\Responsable\cliente_potencial;

use App\Models\Cliente;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ClienteVerificarCelular implements Responsable
{
    public function toResponse($request)
    {
        try {
            $cliCelular = trim((string) request('cliCelular', ''));

            // Los celulares nuevos llegan en E.164 (+573001234567); los antiguos
            // de Colombia quedaron guardados sin indicativo (3001234567).
            $variantes = [$cliCelular];

            if (str_starts_with($cliCelular, '+57')) {
                $variantes[] = substr($cliCelular, 3);
            } elseif ($cliCelular !== '' && ! str_starts_with($cliCelular, '+')) {
                $variantes[] = '+57' . $cliCelular;
            }

            if ($cliCelular === '') {
                return response()->json('celular_vacio');
            }

            $existeCelular = Cliente::whereIn('cli_celular', $variantes)->exists();

            // Mismos códigos que verificar documento / correo
            if ($existeCelular) {
                return response()->json('existe_celular');
            }

            return response()->json('no_existe_celular');

        } catch (Exception $e) {
            return response()->json('error_exception');
        }
    }
}
