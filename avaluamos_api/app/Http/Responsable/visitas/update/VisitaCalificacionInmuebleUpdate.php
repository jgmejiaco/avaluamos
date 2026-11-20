<?php

namespace App\Http\Responsable\visitas\update;

use App\Models\CalificacionInmueble;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaCalificacionInmuebleUpdate implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            CalificacionInmueble::where('id_visita', $this->idVisita)
                ->update([
                    'cal_estructura'            => request('cal_estructura', null),
                    'cal_porton_ppal'           => request('cal_porton_ppal', null),
                    'cal_fachada'               => request('cal_fachada', null),
                    'cal_puertas'               => request('cal_puertas', null),
                    'cal_muros'                 => request('cal_muros', null),
                    'cal_ventaneria'            => request('cal_ventaneria', null),
                    'cal_techos'                => request('cal_techos', null),
                    'cal_carpinteria'           => request('cal_carpinteria', null),
                    'cal_pisos'                 => request('cal_pisos', null),
                    'cal_ventilacion'           => request('cal_ventilacion', null),
                    'cal_cocina'                => request('cal_cocina', null),
                    'cal_iluminacion'           => request('cal_iluminacion', null),
                    'cal_banios'                => request('cal_banios', null),
                    'cal_distribucion'          => request('cal_distribucion', null),
                    'cal_zona_ropas'            => request('cal_zona_ropas', null),
                    'cal_patios'                => request('cal_patios', null),
                    'cal_humedades'             => request('cal_humedades', null),
                    'obs_calificacion_inmueble' => request('obs_calificacion_inmueble', null),
                ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Calificación Inmueble editado satisfactoriamente',
                'id_visita' => $this->idVisita,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar la Calificación Inmueble',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
