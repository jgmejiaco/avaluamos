<?php

namespace App\Http\Responsable\cliente_potencial;

use App\Models\Cliente;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ClienteVerificarDocumento implements Responsable
{
    public function toResponse($request)
    {
        $idDocCliente = request('idDocCliente', null);
        $documentoCliente = strtoupper(trim((string) request('documentoCliente', '')));

        if (empty($idDocCliente) || $documentoCliente === '') {
            return response()->json('no_existe_documento');
        }

        try {
            $existeDocumento = Cliente::where('id_doc_cliente', $idDocCliente)
                ->where('documento_cliente', $documentoCliente)
                ->exists();

            if ($existeDocumento) {
                return response()->json('existe_documento');
            }

            return response()->json('no_existe_documento');

        } catch (Exception $e) {
            return response()->json('error_exception');
        }
    }
}
