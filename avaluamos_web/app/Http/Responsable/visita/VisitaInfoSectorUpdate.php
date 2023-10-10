<?php

namespace App\Http\Responsable\visita;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use App\Models\InfoSector;

class VisitaInfoSectorUpdate implements Responsable
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
