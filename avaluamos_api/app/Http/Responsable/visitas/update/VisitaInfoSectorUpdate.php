<?php

namespace App\Http\Responsable\visitas\update;

use App\Models\InfoSector;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaInfoSectorUpdate implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            InfoSector::where('id_visita', $this->idVisita)
                ->update([
                    'barrios_sectores'       => request('barrios_sectores', null),
                    'actividad_predominante' => request('actividad_predominante', null),
                    'transporte'             => request('transporte', null),
                    'vias_acceso'            => request('vias_acceso', null),
                ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Info Sector editada satisfactoriamente',
                'id_visita' => $this->idVisita,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar la Info Sector',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
