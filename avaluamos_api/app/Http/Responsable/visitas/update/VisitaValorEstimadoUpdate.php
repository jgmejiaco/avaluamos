<?php

namespace App\Http\Responsable\visitas\update;

use App\Models\ValorEstimadoAvaluo;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaValorEstimadoUpdate implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            ValorEstimadoAvaluo::where('id_visita', $this->idVisita)
                ->update([
                    'valor_estimado_inmueble' => request('valor_estimado_inmueble', null),
                ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Valor Estimado Avalúo editado satisfactoriamente',
                'id_visita' => $this->idVisita,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar el Valor Estimado Avalúo',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
