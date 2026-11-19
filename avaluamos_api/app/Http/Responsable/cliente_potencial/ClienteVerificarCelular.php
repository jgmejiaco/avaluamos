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
            $cliCelular = request('cliCelular', null);

            $clienteVerificarCelular = Cliente::select('cli_celular')
                ->where('cli_celular', $cliCelular)
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
