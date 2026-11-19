<?php

namespace App\Http\Responsable\visitas;

use App\Models\DirigidoA;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaConsultarEmpresa implements Responsable
{
    protected $idEmpresa;

    public function __construct($idEmpresa)
    {
        $this->idEmpresa = $idEmpresa;
    }

    public function toResponse($request)
    {
        try {
            $visitaConsultarEmpresa = DirigidoA::leftJoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'dirigido_a.id_tipo_documento')
                ->select(
                    'dirigido_a.id_tipo_documento',
                    'tipo_documento.decripcion_documento',
                    'dirigido_a.numero_documento'
                )
                ->whereNull('dirigido_a.deleted_at')
                ->where('id_dirigido_a', $this->idEmpresa)
                ->first();

            return response()->json([
                'visitaConsultarEmpresa' => $visitaConsultarEmpresa,
                'message'                 => 'Empresa obtenida correctamente',
                'success'                 => true,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando la empresa para crear la visita',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
