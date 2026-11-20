<?php

namespace App\Http\Responsable\avaluos;

use App\Models\FactorPendiente;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoConsultarFactorPendiente implements Responsable
{
    public function toResponse($request)
    {
        try {
            $idFactorPendiente = request('id_factor_pendiente', null);

            $avaluoFactorPendiente = FactorPendiente::select('valor_pendiente')
                ->where('id_factor_pendiente', $idFactorPendiente)
                ->first();

            return response()->json([
                'avaluoFactorPendiente' => $avaluoFactorPendiente,
                'message'               => 'Avaluo factor pendiente obtenido correctamente',
                'success'               => true,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando el avaluo factor pendiente',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
