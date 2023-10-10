<?php

namespace App\Http\Responsable\visita;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use App\Models\ObservacionesGenerales;

class VisitaObserGeneralesUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idVisita = request('id_visita', null);
        $observacionesGenerales = request('observaciones_generales', null);

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarObserGeneralesComunal = ObservacionesGenerales::where('id_visita', $idVisita)
                ->update([
                    'observaciones_generales' => $observacionesGenerales,
            ]);

            if($editarObserGeneralesComunal) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Observaciones Generales editada satisfactoriamente');
                return redirect('editar_visita/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar las Observaciones Generales, por favor contacte a Soporte.');
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
