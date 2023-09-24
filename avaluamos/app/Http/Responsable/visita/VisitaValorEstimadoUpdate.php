<?php

namespace App\Http\Responsable\visita;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use App\Models\ValorEstimadoAvaluo;

class VisitaValorEstimadoUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idVisita = request('id_visita', null);
        $valorEstimadoInmueble = request('valor_estimado_inmueble', null);

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarValorEstimadoInmueble = ValorEstimadoAvaluo::where('id_visita', $idVisita)
                ->update([
                    'valor_estimado_inmueble' => $valorEstimadoInmueble,
            ]);

            if($editarValorEstimadoInmueble) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Valor Estimado Avalúo editado satisfactoriamente');
                return redirect('editar_visita/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar el Valor Estimado Avalúo, por favor contacte a Soporte.');
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
