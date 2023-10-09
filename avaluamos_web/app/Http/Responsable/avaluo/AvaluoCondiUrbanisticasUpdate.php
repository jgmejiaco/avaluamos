<?php

namespace App\Http\Responsable\avaluo;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use App\Models\Usuario;
use Jenssegers\Date\Date;
use App\Models\Visita;
use App\Models\InfoJuridica;
use App\Models\InfoInmueble;
use App\Models\CaracteristicasInmueble;
use App\Models\AcabadosInmueble;
use App\Models\CalificacionInmueble;
use App\Models\DotacionComunal;
use App\Models\InfoSector;
use App\Models\CondicionesUrbanisticas;
use App\Models\ObservacionesGenerales;
use App\Models\RegistroFotografico;
use App\Models\ValorEstimadoAvaluo;

class AvaluoCondiUrbanisticasUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idVisita = request('id_visita', null);
        $idValorizacion = request('id_valorizacion', null);
        $cuAlumbradoPublico = request('cu_alumbrado_publico', null);
        $cuTransporte = request('cu_transporte', null);
        $cuOrdenPublico = request('cu_orden_publico', null);
        $cuSeguridad = request('cu_seguridad', null);
        $cuSalubridad = request('cu_salubridad', null);
        $cuVias = request('cu_vias', null);
        $idTipoVias = request('id_tipo_vias', null);
        $cuAceras = request('cu_aceras', null);
        $cuRedGas = request('cu_red_gas', null);
        $cuRedTelco = request('cu_red_telco', null);
        $cuRedAcueducto = request('cu_red_acueducto', null);
        $cuRedAlcantarillado = request('cu_red_alcantarillado', null);
        $cuBarriosSectores = request('cu_barrios_sectores', null);
        $cuTipoEdificaciones = request('cu_tipo_edificaciones', null);
        $obsCondicionesUrbanisticas = request('obs_condiciones_urbanisticas', null);

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarCondiUrbanisticasComunal = CondicionesUrbanisticas::where('id_visita', $idVisita)
                ->update([
                    'id_valorizacion' => $idValorizacion,
                    'cu_alumbrado_publico' => $cuAlumbradoPublico,
                    'cu_transporte' => $cuTransporte,
                    'cu_orden_publico' => $cuOrdenPublico,
                    'cu_seguridad' => $cuSeguridad,
                    'cu_salubridad' => $cuSalubridad,
                    'cu_vias' => $cuVias,
                    'id_tipo_vias' => $idTipoVias,
                    'cu_aceras' => $cuAceras,
                    'cu_red_gas' => $cuRedGas,
                    'cu_red_telco' => $cuRedTelco,
                    'cu_red_acueducto' => $cuRedAcueducto,
                    'cu_red_alcantarillado' => $cuRedAlcantarillado,
                    'cu_barrios_sectores' => $cuBarriosSectores,
                    'cu_tipo_edificaciones' => $cuTipoEdificaciones,
                    'obs_condiciones_urbanisticas' => $obsCondicionesUrbanisticas,
            ]);

            if($editarCondiUrbanisticasComunal) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Condiciones Urbanísticas editada satisfactoriamente');
                return redirect('editar_visita/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar la Condición Urbanística, por favor contacte a Soporte.');
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
