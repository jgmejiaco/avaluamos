<?php

namespace App\Http\Responsable\avaluos\update;

use App\Models\CondicionesUrbanisticas;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoCondiUrbanisticasUpdate implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            CondicionesUrbanisticas::where('id_visita', $this->idVisita)
                ->update([
                    'id_valorizacion'              => request('id_valorizacion', null),
                    'cu_alumbrado_publico'         => request('cu_alumbrado_publico', null),
                    'cu_transporte'                => request('cu_transporte', null),
                    'cu_orden_publico'             => request('cu_orden_publico', null),
                    'cu_seguridad'                 => request('cu_seguridad', null),
                    'cu_salubridad'                => request('cu_salubridad', null),
                    'cu_vias'                      => request('cu_vias', null),
                    'id_tipo_vias'                 => request('id_tipo_vias', null),
                    'cu_aceras'                    => request('cu_aceras', null),
                    'cu_red_gas'                   => request('cu_red_gas', null),
                    'cu_red_telco'                 => request('cu_red_telco', null),
                    'cu_red_acueducto'             => request('cu_red_acueducto', null),
                    'cu_red_alcantarillado'        => request('cu_red_alcantarillado', null),
                    'cu_barrios_sectores'          => request('cu_barrios_sectores', null),
                    'cu_tipo_edificaciones'        => request('cu_tipo_edificaciones', null),
                    'obs_condiciones_urbanisticas' => request('obs_condiciones_urbanisticas', null),
                ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Condiciones Urbanísticas editada satisfactoriamente',
                'id_visita' => $this->idVisita,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar las Condiciones Urbanísticas',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
