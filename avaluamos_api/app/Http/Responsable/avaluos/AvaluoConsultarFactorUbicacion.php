<?php

namespace App\Http\Responsable\avaluos;

use App\Models\FactorUbicacion;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoConsultarFactorUbicacion implements Responsable
{
    public function toResponse($request)
    {
        try {
            $idFactorUbicacion = request('id_factor_ubicacion', null);

            $avaluoFactorUbicacion = FactorUbicacion::select('valor_ubicacion')
                ->where('id_factor_ubicacion', $idFactorUbicacion)
                ->first();

            return response()->json([
                'avaluoFactorUbicacion' => $avaluoFactorUbicacion,
                'message'               => 'Avaluo factor de ubicación obtenido correctamente',
                'success'               => true,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando el avaluo factor de ubicación',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
