<?php

namespace App\Http\Responsable\visitas;

use App\Models\FactorPendiente;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaConsultarFactorPendiente implements Responsable
{
    public function toResponse($request)
    {
        try {
            $idFactorPendiente = request('id_factor_pendiente', null);

            $factorPendiente = FactorPendiente::select('valor_pendiente')
                ->where('id_factor_pendiente', $idFactorPendiente)
                ->first();

            return response()->json([
                'factorPendiente' => $factorPendiente,
                'message'         => 'Factor pendiente obtenido correctamente',
                'success'         => true,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando el factor pendiente',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
