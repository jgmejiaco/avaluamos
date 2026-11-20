<?php

namespace App\Http\Responsable\calendario;

use App\Models\Calendario;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class CalendarioConsultarVisitas implements Responsable
{
    public function toResponse($request)
    {
        try {
            $consultarVisitasCalendario = Calendario::leftJoin('tipo_inmueble', 'tipo_inmueble.id_tipo_inmueble', '=', 'calendario.tipo_inmueble')
                ->leftJoin('ciudad', 'ciudad.id_ciudad', '=', 'calendario.municipio')
                ->leftJoin('si_no', 'si_no.id_si_no', '=', 'calendario.visita_cumplida')
                ->select(
                    'id_visita_calendario',
                    'nombre_cliente',
                    'municipio',
                    'descripcion_ciudad',
                    DB::raw('DATE_FORMAT(FROM_UNIXTIME(fecha_visita_calendario), "%Y-%m-%d %H:%i") as fecha_visita_calendario'),
                    'visita_cumplida'
                )
                ->get();

            $arrayVisitasCalendario = [];

            foreach ($consultarVisitasCalendario as $visita) {
                if (isset($visita->visita_cumplida) && ! is_null($visita->visita_cumplida) && ! empty($visita->visita_cumplida) && $visita->visita_cumplida == 1) {
                    $colorVisita = '#449D44';
                } else {
                    $colorVisita = 'red';
                }

                $arrayVisitasCalendario[] = [
                    'id'    => $visita->id_visita_calendario,
                    'title' => "\n".$visita->nombre_cliente.' - '.$visita->descripcion_ciudad,
                    'start' => $visita->fecha_visita_calendario,
                    'color' => $colorVisita,
                ];
            }

            return response()->json([
                'visitas_calendario' => $arrayVisitasCalendario,
                'message'            => 'Visitas del calendario obtenidas correctamente',
                'success'            => true,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando las visitas del calendario',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
