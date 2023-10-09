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

class AvaluoCalificacionInmuebleUpdate implements Responsable
{
    public function toResponse($request)
    {
        // dd($request);
        $idVisita = request('id_visita', null);
        $calEstructura = request('cal_estructura', null);
        $calPortonPpal = request('cal_porton_ppal', null);
        $calFachada = request('cal_fachada', null);
        $calPuertas = request('cal_puertas', null);
        $calMuros = request('cal_muros', null);
        $calVentaneria = request('cal_ventaneria', null);
        $calTechos = request('cal_techos', null);
        $calCarpinteria = request('cal_carpinteria', null);
        $calPisos = request('cal_pisos', null);
        $calVentilacion = request('cal_ventilacion', null);
        $calCocina = request('cal_cocina', null);
        $calIluminacion = request('cal_iluminacion', null);
        $calBanios = request('cal_banios', null);
        $calDistribucion = request('cal_distribucion', null);
        $calZonaRopas = request('cal_zona_ropas', null);
        $calPatios = request('cal_patios', null);
        $calHumedades = request('cal_humedades', null);
        $obsCalificacionInmueble = request('obs_calificacion_inmueble', null);

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarCalificacionInmueble = CalificacionInmueble::where('id_visita', $idVisita)
                ->update([
                    'cal_estructura' => $calEstructura,
                    'cal_porton_ppal' => $calPortonPpal,
                    'cal_fachada' => $calFachada,
                    'cal_puertas' => $calPuertas,
                    'cal_muros' => $calMuros,
                    'cal_ventaneria' => $calVentaneria,
                    'cal_techos' => $calTechos,
                    'cal_carpinteria' => $calCarpinteria,
                    'cal_pisos' => $calPisos,
                    'cal_ventilacion' => $calVentilacion,
                    'cal_cocina' => $calCocina,
                    'cal_iluminacion' => $calIluminacion,
                    'cal_banios' => $calBanios,
                    'cal_distribucion' => $calDistribucion,
                    'cal_zona_ropas' => $calZonaRopas,
                    'cal_patios' => $calPatios,
                    'cal_humedades' => $calHumedades,
                    'obs_calificacion_inmueble' => $obsCalificacionInmueble
            ]);

            if($editarCalificacionInmueble) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Calificación Inmueble editado satisfactoriamente');
                return redirect('editar_visita/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar la Calificación Inmueble, por favor contacte a Soporte.');
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
