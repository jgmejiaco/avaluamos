<?php

namespace App\Http\Responsable\avaluo;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use App\Models\EstadoConservacion;

class AvaluoEstadoConservacionUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idVisita = request('id_visita', null);
        $idFactorCalidad = request('id_factor_calidad', null);
        $idFactorZona = request('id_factor_zona', null);
        $idFactorTiempo = request('id_factor_tiempo', null);
        $idFactorPendiente = request('id_factor_pendiente', null);
        $valorPendiente = request('valor_pendiente', null);
        $idFactorUbicacion = request('id_factor_ubicacion', null);
        $valorUbicacion = request('valor_ubicacion', null);
        $idEstadoConservacionOpciones = request('id_estado_conservacion_opciones', null);

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarEstadoConservacion = EstadoConservacion::where('id_visita', $idVisita)
                ->update([
                    'id_factor_calidad' => $idFactorCalidad,
                    'id_factor_zona' => $idFactorZona,
                    'id_factor_tiempo' => $idFactorTiempo,
                    'id_factor_pendiente' => $idFactorPendiente,
                    'valor_pendiente' => $valorPendiente,
                    'id_factor_ubicacion' => $idFactorUbicacion,
                    'valor_ubicacion' => $valorUbicacion,
                    'id_estado_conservacion_opciones' => $idEstadoConservacionOpciones,
            ]);

            if($editarEstadoConservacion) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Estado de Conservación editado satisfactoriamente');
                return redirect('calcular_avaluo/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar el Estado de Conservación, por favor contacte a Soporte.');
                return redirect('calcular_avaluo/'.$idVisita);
                // return redirect('editar_visita/'.$id_visita.'/actualizar#nav-familiar');
            }
        }
        catch (Exception $e)
        {
            dd($e);
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
