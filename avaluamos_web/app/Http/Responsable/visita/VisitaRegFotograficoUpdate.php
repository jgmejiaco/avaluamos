<?php

namespace App\Http\Responsable\visita;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use App\Models\RegistroFotografico;
use App\Models\Cliente;
use App\Traits\FileUploadTrait;
use Carbon\Carbon;

class VisitaRegFotograficoUpdate implements Responsable
{
    use FileUploadTrait;

    public function toResponse($request)
    {
        $idVisita = request('id_visita', null);
        $idCliente = request('id_cliente', null);
        // $rfFachada = request('rf_fachada', null);
        // $rfEntrada = request('rf_entrada', null);
        // $rfSala1 = request('rf_sala1', null);
        // $rfSala2 = request('rf_sala2', null);
        // $rfSala3 = request('rf_sala3', null);
        // $rfComedor1 = request('rf_comedor1', null);
        // $rfComedor2 = request('rf_comedor2', null);
        // $rfComedor3 = request('rf_comedor3', null);
        // $rfCocina1 = request('rf_cocina1', null);
        // $rfCocina2 = request('rf_cocina2', null);
        // $rfCocina3 = request('rf_cocina3', null);
        // $rfHabitacion1 = request('rf_habitacion1', null);
        // $rfHabitacion2 = request('rf_habitacion2', null);
        // $rfHabitacion3 = request('rf_habitacion3', null);
        // $rfHabitacion4 = request('rf_habitacion4', null);
        // $rfHabitacion5 = request('rf_habitacion5', null);
        // $rfHabitacion6 = request('rf_habitacion6', null);
        // $rfHabitacion7 = request('rf_habitacion7', null);
        // $rfBano1 = request('rf_bano1', null);
        // $rfBano2 = request('rf_bano2', null);
        // $rfBano3 = request('rf_bano3', null);
        // $rfPatio1 = request('rf_patio1', null);
        // $rfPatio2 = request('rf_patio2', null);
        // $rfPatio3 = request('rf_patio3', null);
        // $rfEstudio1 = request('rf_estudio1', null);
        // $rfEstudio2 = request('rf_estudio2', null);
        // $rfEstudio3 = request('rf_estudio3', null);
        // $rfCuartoUtil1 = request('rf_cuarto_util1', null);
        // $rfCuartoUtil2 = request('rf_cuarto_util2', null);
        // $rfCuartoUtil3 = request('rf_cuarto_util3', null);
        // $rfPasillo1 = request('rf_pasillo1', null);
        // $rfPasillo2 = request('rf_pasillo2', null);
        // $rfPasillo3 = request('rf_pasillo3', null);
        // $rfZonaRopa1 = request('rf_zona_ropa1', null);
        // $rfZonaRopa2 = request('rf_zona_ropa2', null);
        // $rfZonaRopa3 = request('rf_zona_ropa3', null);
        // $rfBalcon1 = request('rf_balcon1', null);
        // $rfBalcon2 = request('rf_balcon2', null);
        // $rfBalcon3 = request('rf_balcon3', null);

        // ==============================================================================
        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            // $usu_usuario = Cliente::select('cli_cliente')->where('usu_codigo', $usuario_oculto)->get()->first();

            $fechaActual = Carbon::now();
            $fechaActual = $fechaActual->format('d-m-Y_H:m:s');
            $baseFileName = "vis({$idVisita})_cli({$idCliente})_".$fechaActual;
            // dd($request, $baseFileName);

            $carpetaArchivos = '/upfiles/visita';

            $rfFachada= '';
            if ($request->hasFile('rf_fachada')) {
                $rfFachada = $this->upfileWithName($baseFileName, $carpetaArchivos, $request, 'rf_fachada', 'fachada');
            } else {
                $rfFachada = null;
            }

            // dd($rfFachada, $baseFileName);

            $editarRegFotografico = RegistroFotografico::where('id_visita',$idVisita)
                ->update([
                    'rf_fachada' => $rfFachada,
                    // 'rf_entrada' => $rfEntrada,
                    // 'rf_sala1' => $rfSala1,
                    // 'rf_sala2' => $rfSala2,
                    // 'rf_sala3' => $rfSala3,
                    // 'rf_comedor1' => $rfComedor1,
                    // 'rf_comedor2' => $rfComedor2,
                    // 'rf_comedor3' => $rfComedor3,
                    // 'rf_cocina1' => $rfCocina1,
                    // 'rf_cocina2' => $rfCocina2,
                    // 'rf_cocina3' => $rfCocina3,
                    // 'rf_habitacion1' => $rfHabitacion1,
                    // 'rf_habitacion2' => $rfHabitacion2,
                    // 'rf_habitacion3' => $rfHabitacion3,
                    // 'rf_habitacion4' => $rfHabitacion4,
                    // 'rf_habitacion5' => $rfHabitacion5,
                    // 'rf_habitacion6' => $rfHabitacion6,
                    // 'rf_habitacion7' => $rfHabitacion7,
                    // 'rf_bano1' => $rfBano1,
                    // 'rf_bano2' => $rfBano2,
                    // 'rf_bano3' => $rfBano3,
                    // 'rf_patio1' => $rfPatio1,
                    // 'rf_patio2' => $rfPatio2,
                    // 'rf_patio3' => $rfPatio3,
                    // 'rf_estudio1' => $rfEstudio1,
                    // 'rf_estudio2' => $rfEstudio2,
                    // 'rf_estudio3' => $rfEstudio3,
                    // 'rf_cuarto_util1' => $rfCuartoUtil1,
                    // 'rf_cuarto_util2' => $rfCuartoUtil2,
                    // 'rf_cuarto_util3' => $rfCuartoUtil3,
                    // 'rf_pasillo1' => $rfPasillo1,
                    // 'rf_pasillo2' => $rfPasillo2,
                    // 'rf_pasillo3' => $rfPasillo3,
                    // 'rf_zona_ropa1' => $rfZonaRopa1,
                    // 'rf_zona_ropa2' => $rfZonaRopa2,
                    // 'rf_zona_ropa3' => $rfZonaRopa3,
                    // 'rf_balcon1' => $rfBalcon1,
                    // 'rf_balcon2' => $rfBalcon2,
                    // 'rf_balcon3' => $rfBalcon3,
                ]);

            if($editarRegFotografico) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Registro fotográfico editado satisfactoriamente');
                return redirect('editar_visita/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar el Registro fotográfico, por favor contacte a Soporte.');
                return redirect('editar_visita/'.$idVisita);
            }
        } catch (Exception $e) {
            dd($e);
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
