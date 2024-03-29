<?php

namespace App\Http\Responsable\avaluo;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use App\Models\CaracteristicasInmueble;

class AvaluoCaracteristicasInmuebleUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idVisita = request('id_visita', null);
        $cocinas = request('cocinas', null);
        $habitaciones = request('habitaciones', null);
        $salas = request('salas', null);
        $habitacionesServicio = request('habitaciones_servicio', null);
        $comedores = request('comedores', null);
        $baniosServicio = request('banios_servicio', null);
        $baniosSocial = request('banios_social', null);
        $baniosPrivado = request('banios_privado', null);
        $balcones = request('balcones', null);
        $zonaRopa = request('zona_ropa', null);
        $estudios = request('estudios', null);
        $patios = request('patios', null);
        $vestier = request('vestier', null);
        $escalaEmergencia = request('escala_emergencia', null);
        $closets = request('closets', null);
        $shutBasura = request('shut_basura', null);
        $cantParqueaderos = request('cant_parqueaderos', null);
        $cantCuartoUtil = request('cant_cuarto_util', null);
        $cantKioscos = request('cant_kioscos', null);
        $cantPiscinas = request('cant_piscinas', null);
        $cantEstablos = request('cant_establos', null);
        $cantBillares = request('cant_billares', null);
        $cantAscensores = request('cant_ascensores', null);
        $obsCaractInmueble = request('obs_caract_inmueble', null);

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarCaractInmueble = CaracteristicasInmueble::where('id_visita', $idVisita)
                ->update([
                    'cocinas' => $cocinas,
                    'habitaciones' => $habitaciones,
                    'salas' => $salas,
                    'habitaciones_servicio' => $habitacionesServicio,
                    'comedores' => $comedores,
                    'banios_servicio' => $baniosServicio,
                    'banios_social' => $baniosSocial,
                    'banios_privado' => $baniosPrivado,
                    'balcones' => $balcones,
                    'zona_ropa' => $zonaRopa,
                    'estudios' => $estudios,
                    'patios' => $patios,
                    'vestier' => $vestier,
                    'escala_emergencia' => $escalaEmergencia,
                    'closets' => $closets,
                    'shut_basura' => $shutBasura,
                    'cant_parqueaderos' => $cantParqueaderos,
                    'cant_cuarto_util' => $cantCuartoUtil,
                    'cant_kioskos' => $cantKioscos,
                    'cant_piscinas' => $cantPiscinas,
                    'cant_establos' => $cantEstablos,
                    'cant_billares' => $cantBillares,
                    'cant_ascensores' => $cantAscensores,
                    'obs_caract_inmueble' => $obsCaractInmueble,
            ]);

            if($editarCaractInmueble) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Características Inmueble editada satisfactoriamente');
                return redirect('calcular_avaluo/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar las Características Inmueble, por favor contacte a Soporte.');
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
