<?php

namespace App\Http\Responsable\calendario;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\Models\Calendario;

class CalendarioStore implements Responsable
{
    public function toResponse($request)
    {
        $fechaVisita = request('fecha_visita', null);
        $nombreCliente = request('nombre_cliente', null);
        $celular = request('celular', null);
        $tipoInmueble = request('tipo_inmueble', null);
        $ciudad = request('ciudad', null);
        $barrio = request('barrio', null);
        $direccion = request('direccion', null);
        $visitado = request('visitado', null);

        // ==============================================================================
        
        if (isset($fechaVisita) && !is_null($fechaVisita) && !empty($fechaVisita)) {
            $fechaVisita = Date::parse($fechaVisita)->timestamp;
        } else {
            $fechaVisita = null;
        }

        // ==============================================================================

        if ($visitado != null || $visitado != "") {
            $visitado = request('visitado', null);
        } else {
            $visitado = null;
        }
       
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $visitaCalendario = Calendario::create([
                'fecha_visita_calendario' => $fechaVisita,
                'nombre_cliente' => $nombreCliente,
                'celular' => $celular,
                'tipo_inmueble' => $tipoInmueble,
                'municipio' => $ciudad,
                'barrio' => $barrio,
                'direccion' => $direccion,
                'visita_cumplida' => $visitado,
            ]);

            if($visitaCalendario) {
                DB::connection('mysql')->commit();
                return response()->json("visita_creada");
            } else {
                DB::connection('mysql')->rollback();
                return response()->json("visita_no_creada");
            }
        }
        catch (Exception $e)
        {
            DB::connection('mysql')->rollback();
            return response()->json("error_exception");
        }
    }
}
