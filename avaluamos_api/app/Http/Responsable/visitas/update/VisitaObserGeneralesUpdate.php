<?php

namespace App\Http\Responsable\visitas\update;

use App\Models\ObservacionesGenerales;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaObserGeneralesUpdate implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            ObservacionesGenerales::where('id_visita', $this->idVisita)
                ->update([
                    'observaciones_generales' => request('observaciones_generales', null),
                ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Observaciones Generales editada satisfactoriamente',
                'id_visita' => $this->idVisita,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar las Observaciones Generales',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
