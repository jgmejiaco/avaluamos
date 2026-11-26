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

            $clienteVerificarCelular = Cliente::select('cli_celular')
                ->whereIn('cli_celular', $variantes)
                ->first();

            if (isset($clienteVerificarCelular) && ! is_null($clienteVerificarCelular) && ! empty($clienteVerificarCelular)) {
                return response()->json([
                    'message' => 'El celular existe',
                    'success' => true,
                ], 200);
            }

            return response()->json([
                'message' => 'El celular no existe',
                'success' => false,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error verificando el celular para crear el cliente potencial',
                'success' => false,
            ], 500);
        }
    }
}
