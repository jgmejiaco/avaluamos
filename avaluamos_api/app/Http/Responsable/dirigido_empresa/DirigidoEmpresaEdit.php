<?php

namespace App\Http\Responsable\dirigido_empresa;

use App\Models\DirigidoA;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class DirigidoEmpresaEdit implements Responsable
{
    protected $idDirigidoA;

    public function __construct($idDirigidoA)
    {
        $this->idDirigidoA = $idDirigidoA;
    }

    public function toResponse($request)
    {
        try {
            $empresa = DirigidoA::leftJoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'dirigido_a.id_tipo_documento')
                ->select(
                    'dirigido_a.id_dirigido_a',
                    'dirigido_a.dirigido_a',
                    'dirigido_a.id_tipo_documento',
                    'dirigido_a.numero_documento',
                    'tipo_documento.decripcion_documento'
                )
                ->where('dirigido_a.id_dirigido_a', $this->idDirigidoA)
                ->whereNull('dirigido_a.deleted_at')
                ->first();

            if (! $empresa) {
                return response()->json([
                    'success' => false,
                    'message' => 'No existe la empresa',
                ], 404);
            }

            return response()->json($empresa);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando la empresa',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
