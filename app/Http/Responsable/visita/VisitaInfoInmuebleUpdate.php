<?php

namespace App\Http\Responsable\visita;

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

class VisitaInfoInmuebleUpdate implements Responsable
{
    public function toResponse($request)
    {
        // dd($request);

        $idVisita = request('id_visita', null);
        $idTipoInmueble = request('id_tipo_inmueble', null);
        $idTipoVivienda = request('id_tipo_vivienda', null);
        $idUsoInmueble = request('id_uso_inmueble', null);
        $idTipoSuelo = request('id_tipo_suelo', null);
        $idTopografia = request('id_topografia', null);
        $idForma = request('id_forma', null);
        $pisosInmueble = request('pisos_inmueble', null);
        $pisosEdificio = request('pisos_edificio', null);
        $valorAdministracion = request('valor_administracion', null);
        $barrio = strtoupper(request('barrio', null));
        $remodelado = request('remodelado', null);
        $altura = request('altura', null);
        $frente = request('frente', null);
        $fondo = request('fondo', null);
        $areaLibre = request('area_libre', null);
        $aniosConstruccion = request('anios_construccion', null);
        $aniosRemodelacion = request('anios_remodelacion', null);
        $areaConstruida = request('area_construida', null);
        $areaPatios = request('area_patios', null);
        $idCondicionInmueble = request('id_condicion_inmueble', null);
        $porcentajeDepreciacion = request('porcentaje_depreciacion', null);
        $idFittoCorvini = request('id_fitto_corvini', null);
        $vidaUtilAnios = request('vida_util_anios', null);
        $vetustezAnios = request('vetustez_anios', null);
        $vidaPermanenteAnios = request('vida_permanente_anios', null);
        $obsInfoInmueble = request('obs_info_inmueble', null);

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarInfoInmueble = InfoInmueble::where('id_visita', $idVisita)
                ->update([
                    'id_tipo_inmueble' => $idTipoInmueble,
                    'id_tipo_vivienda' => $idTipoVivienda,
                    'id_uso_inmueble' => $idUsoInmueble,
                    'id_tipo_suelo' => $idTipoSuelo,
                    'id_topografia' => $idTopografia,
                    'id_forma' => $idForma,
                    'pisos_inmueble' => $pisosInmueble,
                    'pisos_edificio' => $pisosEdificio,
                    'valor_administracion' => $valorAdministracion,
                    'barrio' => $barrio,
                    'remodelado' => $remodelado,
                    'altura' => $altura,
                    'frente' => $frente,
                    'fondo' => $fondo,
                    'area_libre' => $areaLibre,
                    'anios_construccion' => $aniosConstruccion,
                    'anios_remodelacion' => $aniosRemodelacion,
                    'area_construida' => $areaConstruida,
                    'area_patios' => $areaPatios,
                    'id_condicion_inmueble' => $idCondicionInmueble,
                    'porcentaje_depreciacion' => $porcentajeDepreciacion,
                    'id_fitto_corvini' => $idFittoCorvini,
                    'vida_util_anios' => $vidaUtilAnios,
                    'vetustez_anios' => $vetustezAnios,
                    'vida_permanente_anios' => $vidaPermanenteAnios,
                    'obs_info_inmueble' => $obsInfoInmueble
            ]);

            if($editarInfoInmueble) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Info Inmueble editada satisfactoriamente');
                return redirect('editar_visita/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar la Información Inmueble, por favor contacte a Soporte.');
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
