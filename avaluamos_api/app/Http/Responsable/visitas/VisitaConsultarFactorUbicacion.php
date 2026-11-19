<?php

namespace App\Http\Responsable\visitas;

use App\Models\FactorUbicacion;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaConsultarFactorUbicacion implements Responsable
{
    public function toResponse($request)
    {
        try {
            $idFactorUbicacion = request('id_factor_ubicacion', null);

            $factorUbicacion = FactorUbicacion::select('valor_ubicacion')
                ->where('id_factor_ubicacion', $idFactorUbicacion)
                ->first();

            return response()->json($factorUbicacion);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando el factor de ubicación',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
