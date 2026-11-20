<?php

namespace App\Http\Responsable\avaluos\update;

use App\Models\EstadoConservacion;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoEstadoConservacionUpdate implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            EstadoConservacion::where('id_visita', $this->idVisita)
                ->update([
                    'id_factor_calidad'               => request('id_factor_calidad', null),
                    'id_factor_zona'                  => request('id_factor_zona', null),
                    'id_factor_tiempo'                => request('id_factor_tiempo', null),
                    'id_factor_pendiente'             => request('id_factor_pendiente', null),
                    'valor_pendiente'                 => request('valor_pendiente', null),
                    'id_factor_ubicacion'             => request('id_factor_ubicacion', null),
                    'valor_ubicacion'                 => request('valor_ubicacion', null),
                    'id_estado_conservacion_opciones' => request('id_estado_conservacion_opciones', null),
                ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Estado de Conservación editado satisfactoriamente',
                'id_visita' => $this->idVisita,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar el Estado de Conservación',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
