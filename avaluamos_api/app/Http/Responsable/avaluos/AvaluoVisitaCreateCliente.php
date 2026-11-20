<?php

namespace App\Http\Responsable\avaluos;

use App\Models\Cliente;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoVisitaCreateCliente implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            $crearAvaluoVisitaCliente = Cliente::leftJoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                ->leftJoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'clientes.id_doc_cliente')
                ->leftJoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
                ->leftJoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
                ->select(
                    'id_cliente',
                    'cli_nombres',
                    'clientes.id_doc_cliente',
                    'decripcion_documento as cli_tipo_doc',
                    'documento_cliente',
                    'fecha_nacimiento',
                    'cli_celular',
                    'cli_email',
                    'clientes.id_tipo_persona',
                    'tipo_persona',
                    'clientes.id_referido_por',
                    'referido_por',
                    'clientes.id_red_social',
                    'redes_sociales.red_social',
                    'clientes.nombre_quien_refiere',
                    'clientes.empresa_que_refiere'
                )
                ->where('id_cliente', $this->idVisita)
                ->whereNull('clientes.deleted_at')
                ->first();

            if (! $crearAvaluoVisitaCliente) {
                return response()->json([
                    'success' => false,
                    'message' => 'No existe el cliente para el avalúo',
                ], 404);
            }

            return response()->json([
                'crearAvaluoVisitaCliente' => $crearAvaluoVisitaCliente,
                'message'                  => 'Cliente obtenido correctamente',
                'success'                  => true,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando el cliente para el avalúo',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
