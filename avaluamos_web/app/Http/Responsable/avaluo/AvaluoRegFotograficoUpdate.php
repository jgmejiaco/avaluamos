<?php

namespace App\Http\Responsable\avaluo;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use App\Models\RegistroFotografico;
use App\Traits\FileUploadTrait;
use Carbon\Carbon;

class AvaluoRegFotograficoUpdate implements Responsable
{
    use FileUploadTrait;

    public function toResponse($request)
    {
        $idVisita = request('id_visita', null);
        $idCliente = request('id_cliente', null);

        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $fechaActual = Carbon::now();
            $fechaActual = $fechaActual->format('d-m-Y_H_i_s');
            $baseFileName = "vis({$idVisita})_cli({$idCliente})_".$fechaActual;

            $carpetaArchivos = 'app/public/upfiles/visita';

            $editarRegFotografico = RegistroFotografico::where('id_visita', $idVisita)->first();

            if ($request->hasFile('rf_fachada')) {
                $editarRegFotografico->rf_fachada = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_fachada', 'rf_fachada');
            }

            // =======================================

            if ($request->hasFile('rf_entrada')) {
                $editarRegFotografico->rf_entrada = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_entrada', 'rf_entrada');
            }

            // =======================================

            if ($request->hasFile('rf_sala1')) {
                $editarRegFotografico->rf_sala1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_sala1', 'rf_sala1');
            }

            // =======================================

            if ($request->hasFile('rf_sala2')) {
                $editarRegFotografico->rf_sala2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_sala2', 'rf_sala2');
            }

            // =======================================

            if ($request->hasFile('rf_sala3')) {
                $editarRegFotografico->rf_sala3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_sala3', 'rf_sala3');
            }

            // =======================================
            
            if ($request->hasFile('rf_comedor1')) {
                $editarRegFotografico->rf_comedor1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_comedor1', 'rf_comedor1');
            }

            // =======================================
            
            if ($request->hasFile('rf_comedor2')) {
                $editarRegFotografico->rf_comedor2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_comedor2', 'rf_comedor2');
            }

            // =======================================
            
            if ($request->hasFile('rf_comedor3')) {
                $editarRegFotografico->rf_comedor3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_comedor3', 'rf_comedor3');
            }

            // =======================================

            if ($request->hasFile('rf_cocina1')) {
                $editarRegFotografico->rf_cocina1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cocina1', 'rf_cocina1');
            }

            // =======================================
            
            if ($request->hasFile('rf_cocina2')) {
                $editarRegFotografico->rf_cocina2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cocina2', 'rf_cocina2');
            }

            // =======================================
            
            if ($request->hasFile('rf_cocina3')) {
                $editarRegFotografico->rf_cocina3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cocina3', 'rf_cocina3');
            }

            // =======================================
            
            if ($request->hasFile('rf_habitacion1')) {
                $editarRegFotografico->rf_habitacion1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion1', 'rf_habitacion1');
            }

            // =======================================
            
            if ($request->hasFile('rf_habitacion2')) {
                $editarRegFotografico->rf_habitacion2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion2', 'rf_habitacion2');
            }

            // =======================================
            
            if ($request->hasFile('rf_habitacion3')) {
                $editarRegFotografico->rf_habitacion3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion3', 'rf_habitacion3');
            }

            // =======================================
            
            if ($request->hasFile('rf_habitacion4')) {
                $editarRegFotografico->rf_habitacion4 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion4', 'rf_habitacion4');
            }

            // =======================================
            
            if ($request->hasFile('rf_habitacion5')) {
                $editarRegFotografico->rf_habitacion5 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion5', 'rf_habitacion5');
            }

            // =======================================
            
            if ($request->hasFile('rf_habitacion6')) {
                $editarRegFotografico->rf_habitacion6 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion6', 'rf_habitacion6');
            }

            // =======================================
            
            if ($request->hasFile('rf_habitacion7')) {
                $editarRegFotografico->rf_habitacion7 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion7', 'rf_habitacion7');
            }

            // =======================================
            
            if ($request->hasFile('rf_bano1')) {
                $editarRegFotografico->rf_bano1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_bano1', 'rf_bano1');
            }

            // =======================================
            
            if ($request->hasFile('rf_bano2')) {
                $editarRegFotografico->rf_bano2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_bano2', 'rf_bano2');
            }

            // =======================================
            
            if ($request->hasFile('rf_bano3')) {
                $editarRegFotografico->rf_bano3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_bano3', 'rf_bano3');
            }

            // =======================================
            
            if ($request->hasFile('rf_patio1')) {
                $editarRegFotografico->rf_patio1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_patio1', 'rf_patio1');
            }

            // =======================================
            
            if ($request->hasFile('rf_patio2')) {
                $editarRegFotografico->rf_patio2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_patio2', 'rf_patio2');
            }

            // =======================================
            
            if ($request->hasFile('rf_patio3')) {
                $editarRegFotografico->rf_patio3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_patio3', 'rf_patio3');
            }

            // =======================================
            
            if ($request->hasFile('rf_estudio1')) {
                $editarRegFotografico->rf_estudio1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_estudio1', 'rf_estudio1');
            }

            // =======================================
            
            if ($request->hasFile('rf_estudio2')) {
                $editarRegFotografico->rf_estudio2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_estudio2', 'rf_estudio2');
            }

            // =======================================
            
            if ($request->hasFile('rf_estudio3')) {
                $editarRegFotografico->rf_estudio3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_estudio3', 'rf_estudio3');
            }

            // =======================================
            
            if ($request->hasFile('rf_cuarto_util1')) {
                $editarRegFotografico->rf_cuarto_util1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cuarto_util1', 'rf_cuarto_util1');
            }

            // =======================================
            
            if ($request->hasFile('rf_cuarto_util2')) {
                $editarRegFotografico->rf_cuarto_util2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cuarto_util2', 'rf_cuarto_util2');
            }

            // =======================================
            
            if ($request->hasFile('rf_cuarto_util3')) {
                $editarRegFotografico->rf_cuarto_util3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cuarto_util3', 'rf_cuarto_util3');
            }

            // =======================================
            
            if ($request->hasFile('rf_pasillo1')) {
                $editarRegFotografico->rf_pasillo1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_pasillo1', 'rf_pasillo1');
            }

            // =======================================
            
            if ($request->hasFile('rf_pasillo2')) {
                $editarRegFotografico->rf_pasillo2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_pasillo2', 'rf_pasillo2');
            }

            // =======================================
            
            if ($request->hasFile('rf_pasillo3')) {
                $editarRegFotografico->rf_pasillo3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_pasillo3', 'rf_pasillo3');
            }

            // =======================================
            
            if ($request->hasFile('rf_zona_ropa1')) {
                $editarRegFotografico->rf_zona_ropa1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_zona_ropa1', 'rf_zona_ropa1');
            }

            // =======================================
            
            if ($request->hasFile('rf_zona_ropa2')) {
                $editarRegFotografico->rf_zona_ropa2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_zona_ropa2', 'rf_zona_ropa2');
            }

            // =======================================
            
            if ($request->hasFile('rf_zona_ropa3')) {
                $editarRegFotografico->rf_zona_ropa3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_zona_ropa3', 'rf_zona_ropa3');
            }

            // =======================================
            
            if ($request->hasFile('rf_balcon1')) {
                $editarRegFotografico->rf_balcon1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_balcon1', 'rf_balcon1');
            }

            // =======================================
            
            if ($request->hasFile('rf_balcon2')) {
                $editarRegFotografico->rf_balcon2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_balcon2', 'rf_balcon2');
            }

            // =======================================
            
            if ($request->hasFile('rf_balcon3')) {
                $editarRegFotografico->rf_balcon3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_balcon3', 'rf_balcon3');
            }

            // =======================================

            $editarRegFotografico->save();

            // =======================================

            if($editarRegFotografico) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Registro fotográfico editado satisfactoriamente');
                return redirect('calcular_avaluo/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar el Registro fotográfico, por favor contacte a Soporte.');
                return redirect('calcular_avaluo/'.$idVisita);
            }
        } catch (Exception $e) {
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
