<?php

namespace App\Http\Responsable\calendario;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;
use App\Models\Calendario;

class CalendarioUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idVisitaEditar = request('id_visita_calendario_editar', null);
        $fechaVisitaEditar = request('fecha_visita_editar', null);
        $nombreClienteEditar = request('nombre_cliente_editar', null);
        $celularEditar = request('celular_editar', null);
        $tipoInmuebleEditar = request('tipo_inmueble_editar', null);
        $ciudadEditar = request('ciudad_editar', null);
        $barrioEditar = request('barrio_editar', null);
        $direccionEditar = request('direccion_editar', null);
        $visitadoEditar = request('visitado_editar', null);

        // ==============================================================================
        
        if (isset($fechaVisitaEditar) && !is_null($fechaVisitaEditar) && !empty($fechaVisitaEditar)) {
            // $fechaVisitaEditar = Date::parse($fechaVisitaEditar)->timestamp;
            $fechaVisitaEditar = strtotime($fechaVisitaEditar);
        } else {
            $fechaVisitaEditar = null;
        }

        // ==============================================================================

        if ($visitadoEditar != null || $visitadoEditar != "") {
            $visitadoEditar = request('visitado_editar', null);
        } else {
            $visitadoEditar = 2;
        }

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarVisitaCalendario = Calendario::where('id_visita_calendario', $idVisitaEditar)
                ->update([
                    'fecha_visita_calendario' => $fechaVisitaEditar,
                    'nombre_cliente' => $nombreClienteEditar,
                    'celular' => $celularEditar,
                    'tipo_inmueble' => $tipoInmuebleEditar,
                    'municipio' => $ciudadEditar,
                    'barrio' => $barrioEditar,
                    'direccion' => $direccionEditar,
                    'visita_cumplida' => $visitadoEditar,
            ]);

            // =============================

            if($editarVisitaCalendario) {
                DB::connection('mysql')->commit();
                return response()->json("visita_editada");

            } else {
                DB::connection('mysql')->rollback();
                return response()->json("visita_no_editada");
            }
        }
        catch (Exception $e)
        {
            DB::connection('mysql')->rollback();
            return response()->json("error_exception");
        }
    }
}
