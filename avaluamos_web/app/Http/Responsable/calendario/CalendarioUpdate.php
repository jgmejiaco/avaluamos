<?php

namespace App\Http\Responsable\calendario;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Calendario;

class CalendarioUpdate implements Responsable
{
    public function toResponse($request)
    {
        dd($request);
        $idVisita = request('id_visita', null);
        $idSistemaConstructivo = request('id_sistema_constructivo', null);
        $portonPrincipal = request('porton_principal', null);
        $idTipoFachada = request('id_tipo_fachada', null);
        $puertas = request('puertas', null);
        $idTipoMuro = request('id_tipo_muro', null);
        $idVentaneria = request('id_ventaneria', null);
        $idTipoTecho = request('id_tipo_techo', null);
        $pisos = request('pisos', null);
        $banios = request('banios', null);
        $cocina = request('cocina', null);
        $meson = request('meson', null);
        $serviciosPublicios = request('servicios_publicos', null);
        $telefono = request('telefono', null);
        $energia = request('energia', null);
        $agua = request('agua', null);
        $gas = request('gas', null);
        $patios = request('patios', null);
        $obsAcabadosInmueble = request('obs_acabados_inmueble', null);

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarAcabadosInmueble = Calendario::where('id_visita', $idVisita)
                ->update([
                    'id_sistema_constructivo' => $idSistemaConstructivo,
                    'porton_principal' => $portonPrincipal,
                    'id_tipo_fachada' => $idTipoFachada,
                    'puertas' => $puertas,
                    'id_tipo_muro' => $idTipoMuro,
                    'id_ventaneria' => $idVentaneria,
                    'id_tipo_techo' => $idTipoTecho,
                    'servicios_publicos' => $serviciosPublicios,
                    'pisos' => $pisos,
                    'telefono' => $telefono,
                    'banios' => $banios,
                    'energia' => $energia,
                    'cocina' => $cocina,
                    'agua' => $agua,
                    'meson' => $meson,
                    'gas' => $gas,
                    'patios' => $patios,
                    'obs_acabados_inmueble' => $obsAcabadosInmueble
            ]);

            if($editarAcabadosInmueble) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Acabados Inmueble editado satisfactoriamente');
                return redirect('editar_visita/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar los Acabados Inmueble, por favor contacte a Soporte.');
                return redirect('editar_visita/'.$idVisita);
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
