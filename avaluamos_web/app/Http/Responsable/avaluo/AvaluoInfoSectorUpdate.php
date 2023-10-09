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

class AvaluoInfoSectorUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idVisita = request('id_visita', null);
        $barriosSectores = request('barrios_sectores', null);
        $actividadPredominante = request('actividad_predominante', null);
        $transporte = request('transporte', null);
        $viasAcceso = request('vias_acceso', null);

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarInfoSectorComunal = InfoSector::where('id_visita', $idVisita)
                ->update([
                    'barrios_sectores' => $barriosSectores,
                    'actividad_predominante' => $actividadPredominante,
                    'transporte' => $transporte,
                    'vias_acceso' => $viasAcceso,
            ]);

            if($editarInfoSectorComunal) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Condiciones Urbanísticas editada satisfactoriamente');
                return redirect('calcular_avaluo/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar la Condición Urbanística, por favor contacte a Soporte.');
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
