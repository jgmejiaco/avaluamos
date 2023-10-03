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
        // dd($request);

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

        if ($visitado == "false" || $visitado == null) {
            $visitado = false;
        } else {
            $visitado = true;
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
                alert()->success('Proceso Exitoso', 'Visita creada satisfactoriamente');
                return redirect()->to(route('calendario.index'));

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al crear la visita, por favor contacte a Soporte.');
                return redirect()->to(route('calendario.index'));
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
