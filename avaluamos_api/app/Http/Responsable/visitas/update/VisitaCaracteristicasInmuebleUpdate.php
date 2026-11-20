<?php

namespace App\Http\Responsable\visitas\update;

use App\Models\CaracteristicasInmueble;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaCaracteristicasInmuebleUpdate implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            CaracteristicasInmueble::where('id_visita', $this->idVisita)
                ->update([
                    'cocinas'               => request('cocinas', null),
                    'habitaciones'          => request('habitaciones', null),
                    'salas'                 => request('salas', null),
                    'habitaciones_servicio' => request('habitaciones_servicio', null),
                    'comedores'             => request('comedores', null),
                    'banios_servicio'       => request('banios_servicio', null),
                    'banios_social'         => request('banios_social', null),
                    'banios_privado'        => request('banios_privado', null),
                    'balcones'              => request('balcones', null),
                    'zona_ropa'             => request('zona_ropa', null),
                    'estudios'              => request('estudios', null),
                    'patios'                => request('patios', null),
                    'vestier'               => request('vestier', null),
                    'escala_emergencia'     => request('escala_emergencia', null),
                    'closets'               => request('closets', null),
                    'shut_basura'           => request('shut_basura', null),
                    'cant_parqueaderos'     => request('cant_parqueaderos', null),
                    'cant_cuarto_util'      => request('cant_cuarto_util', null),
                    'cant_kioskos'          => request('cant_kioskos', null),
                    'cant_piscinas'         => request('cant_piscinas', null),
                    'cant_establos'         => request('cant_establos', null),
                    'cant_billares'         => request('cant_billares', null),
                    'cant_ascensores'       => request('cant_ascensores', null),
                    'obs_caract_inmueble'   => request('obs_caract_inmueble', null),
                ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Características Inmueble editada satisfactoriamente',
                'id_visita' => $this->idVisita,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar las Características Inmueble',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
