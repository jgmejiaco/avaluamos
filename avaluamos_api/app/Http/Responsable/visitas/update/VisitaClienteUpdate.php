<?php

namespace App\Http\Responsable\visitas\update;

use App\Models\Cliente;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaClienteUpdate implements Responsable
{
    protected $idCliente;

    public function __construct($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    public function toResponse($request)
    {
        $cliente = Cliente::where('id_cliente', $this->idCliente)
            ->whereNull('deleted_at')
            ->first();

        if (! $cliente) {
            return response()->json([
                'success' => false,
                'message' => 'No existe el cliente',
            ], 404);
        }

        try {
            Cliente::where('id_cliente', $this->idCliente)
                ->update([
                    'cli_nombres'          => request('cli_nombres', null),
                    'id_doc_cliente'       => request('id_doc_cliente', null),
                    'documento_cliente'    => request('documento_cliente', null),
                    'fecha_nacimiento'     => request('fecha_nacimiento', null),
                    'cli_celular'          => request('cli_celular', null),
                    'cli_email'            => request('cli_email', null),
                    'id_tipo_persona'      => request('id_tipo_persona', null),
                    'id_pais'              => request('id_pais', null),
                    'id_dpto_estado'       => request('id_dpto_estado', null),
                    'id_ciudad'            => request('id_ciudad', null),
                    'id_referido_por'      => request('id_referido_por', null),
                    'id_red_social'        => request('id_red_social', null),
                    'nombre_quien_refiere' => request('nombre_quien_refiere', null),
                    'empresa_que_refiere'  => request('empresa_que_refiere', null),
                ]);

            return response()->json([
                'success'    => true,
                'message'    => 'Cliente editado satisfactoriamente',
                'id_cliente' => $this->idCliente,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar el cliente',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
