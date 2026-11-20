<?php

namespace App\Http\Responsable\visitas\update;

use App\Models\InfoInmueble;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaInfoInmuebleUpdate implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            InfoInmueble::where('id_visita', $this->idVisita)
                ->update([
                    'id_tipo_vivienda'      => request('id_tipo_vivienda', null),
                    'id_uso_inmueble'       => request('id_uso_inmueble', null),
                    'id_tipo_suelo'         => request('id_tipo_suelo', null),
                    'id_topografia'         => request('id_topografia', null),
                    'id_forma'              => request('id_forma', null),
                    'pisos_inmueble'        => request('pisos_inmueble', null),
                    'pisos_edificio'        => request('pisos_edificio', null),
                    'valor_administracion'  => request('valor_administracion', null),
                    'remodelado'            => request('remodelado', null),
                    'altura'                => request('altura', null),
                    'frente'                => request('frente', null),
                    'fondo'                 => request('fondo', null),
                    'area_libre'            => request('area_libre', null),
                    'anios_remodelacion'    => request('anios_remodelacion', null),
                    'area_patios'           => request('area_patios', null),
                    'id_condicion_inmueble' => request('id_condicion_inmueble', null),
                    'obs_info_inmueble'     => request('obs_info_inmueble', null),
                ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Info Inmueble editada satisfactoriamente',
                'id_visita' => $this->idVisita,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar la Información Inmueble',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
