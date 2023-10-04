<?php

namespace App\Http\Responsable\calendario;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;
use App\Models\Calendario;

class CalendarioUpdate implements Responsable
{
    public function toResponse($request)
    {
        // dd($request);

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
            $fechaVisitaEditar = Date::parse($fechaVisitaEditar)->timestamp;
        } else {
            $fechaVisitaEditar = null;
        }

        // ==============================================================================

        if ($visitadoEditar == "false" || $visitadoEditar == null) {
            $visitadoEditar = false;
        } else {
            $visitadoEditar = true;
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

            if($editarVisitaCalendario) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Visita editada satisfactoriamente');
                // return redirect('calendario');
                return redirect()->to(route('calendario.index'));

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar la visita, por favor contacte a Soporte.');
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
