<?php

namespace App\Http\Responsable\cliente_potencial;

use App\Models\Cliente;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ClientePotencialEdit implements Responsable
{
    protected $idClientePotencial;

    public function __construct($idClientePotencial)
    {
        $this->idClientePotencial = $idClientePotencial;
    }

    public function toResponse($request)
    {
        try {
            $cliente = Cliente::leftJoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'clientes.id_doc_cliente')
                ->leftJoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                ->leftJoin('pais', 'pais.id_pais', '=', 'clientes.id_pais')
                ->leftJoin('departamento_estado', 'departamento_estado.id_departamento_estado', '=', 'clientes.id_dpto_estado')
                ->leftJoin('ciudad', 'ciudad.id_ciudad', '=', 'clientes.id_ciudad')
                ->leftJoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
                ->leftJoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
                ->select(
                    'clientes.id_cliente',
                    'clientes.cli_nombres',
                    'clientes.id_doc_cliente',
                    'tipo_documento.decripcion_documento',
                    'clientes.documento_cliente',
                    'clientes.fecha_nacimiento',
                    'clientes.cli_celular',
                    'clientes.cli_email',
                    'clientes.id_tipo_persona',
                    'tipo_persona.tipo_persona',
                    'clientes.id_pais',
                    'clientes.id_dpto_estado',
                    'clientes.id_ciudad',
                    'clientes.id_referido_por',
                    'clientes.id_red_social',
                    'clientes.nombre_quien_refiere',
                    'clientes.empresa_que_refiere'
                )
                ->where('clientes.id_cliente', $this->idClientePotencial)
                ->whereNull('clientes.deleted_at')
                ->first();

            if (! $cliente) {
                return response()->json([
                    'success' => false,
                    'message' => 'No existe el cliente',
                ], 404);
            }

            return response()->json($cliente);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando el cliente',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
