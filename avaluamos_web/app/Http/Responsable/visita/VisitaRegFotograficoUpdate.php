<?php

namespace App\Http\Responsable\visita;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use App\Models\RegistroFotografico;
use App\Traits\FileUploadTrait;
use Carbon\Carbon;

class VisitaRegFotograficoUpdate implements Responsable
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

            $rfFachada = '';
            if ($request->hasFile('rf_fachada')) {
                $rfFachada = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_fachada', 'rf_fachada');
            } else {
                $rfFachada = null;
            }

            // =======================================

            $rfEntrada = '';
            if ($request->hasFile('rf_entrada')) {
                $rfEntrada = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_entrada', 'rf_entrada');
            } else {
                $rfEntrada = null;
            }

            // =======================================

            $rfSala1 = '';
            if ($request->hasFile('rf_sala1')) {
                $rfSala1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_sala1', 'rf_sala1');
            } else {
                $rfSala1 = null;
            }

            // =======================================

            $rfSala2 = '';
            if ($request->hasFile('rf_sala2')) {
                $rfSala2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_sala2', 'rf_sala2');
            } else {
                $rfSala2 = null;
            }

            // =======================================

            $rfSala3 = '';
            if ($request->hasFile('rf_sala2')) {
                $rfSala3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_sala3', 'rf_sala3');
            } else {
                $rfSala3 = null;
            }

            // =======================================
            
            $rfComedor1 = '';
            if ($request->hasFile('rf_comedor1')) {
                $rfComedor1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_comedor1', 'rf_comedor1');
            } else {
                $rfComedor1 = null;
            }

            // =======================================
            
            $rfComedor2 = '';
            if ($request->hasFile('rf_comedor2')) {
                $rfComedor2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_comedor2', 'rf_comedor2');
            } else {
                $rfComedor2 = null;
            }

            // =======================================
            
            $rfComedor3 = '';
            if ($request->hasFile('rf_comedor3')) {
                $rfComedor3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_comedor3', 'rf_comedor3');
            } else {
                $rfComedor3 = null;
            }

            // =======================================

            $rfCocina1 = '';
            if ($request->hasFile('rf_cocina1')) {
                $rfCocina1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cocina1', 'rf_cocina1');
            } else {
                $rfCocina1 = null;
            }

            // =======================================
            
            $rfCocina2 = '';
            if ($request->hasFile('rf_cocina2')) {
                $rfCocina2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cocina2', 'rf_cocina2');
            } else {
                $rfCocina2 = null;
            }

            // =======================================
            
            $rfCocina3 = '';
            if ($request->hasFile('rf_cocina3')) {
                $rfCocina3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cocina3', 'rf_cocina3');
            } else {
                $rfCocina3 = null;
            }

            // =======================================
            
            $rfHabitacion1= '';
            if ($request->hasFile('rf_habitacion1')) {
                $rfHabitacion1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion1', 'rf_habitacion1');
            } else {
                $rfHabitacion1 = null;
            }

            // =======================================
            
            $rfHabitacion2 = '';
            if ($request->hasFile('rf_habitacion2')) {
                $rfHabitacion2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion2', 'rf_habitacion2');
            } else {
                $rfHabitacion2 = null;
            }

            // =======================================
            
            $rfHabitacion3 = '';
            if ($request->hasFile('rfHabitacion')) {
                $rfHabitacion3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion3', 'r_habitacion3');
            } else {
                $rfHabitacion3 = null;
            }

            // =======================================
            
            $rfHabitacion4 = '';
            if ($request->hasFile('rfHabitacion')) {
                $rfHabitacion4 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion4', 'rf_habitacion4');
            } else {
                $rfHabitacion4 = null;
            }

            // =======================================
            
            $rfHabitacion5 = '';
            if ($request->hasFile('rfHabitacion')) {
                $rfHabitacion5 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion5', 'rf_habitacion5');
            } else {
                $rfHabitacion5 = null;
            }

            // =======================================
            
            $rfHabitacion6 = '';
            if ($request->hasFile('rfHabitacion')) {
                $rfHabitacion6 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion6', 'rf_habitacion6');
            } else {
                $rfHabitacion6 = null;
            }

            // =======================================
            
            $rfHabitacion7 = '';
            if ($request->hasFile('rfHabitacion')) {
                $rfHabitacion7 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion7', 'rf_habitacion7');
            } else {
                $rfHabitacion7 = null;
            }

            // =======================================
            
            $rfBano1 = '';
            if ($request->hasFile('rf_bano1')) {
                $rfBano1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_bano1', 'rf_bano1');
            } else {
                $rfBano1 = null;
            }

            // =======================================
            
            $rfBano2 = '';
            if ($request->hasFile('rf_bano2')) {
                $rfBano2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_bano2', 'rf_bano2');
            } else {
                $rfBano2 = null;
            }

            // =======================================
            
            $rfBano3 = '';
            if ($request->hasFile('rf_bano3')) {
                $rfBano3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_bano3', 'rf_bano3');
            } else {
                $rfBano3 = null;
            }

            // =======================================
            
            $rfPatio1 = '';
            if ($request->hasFile('rf_patio1')) {
                $rfPatio1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_patio1', 'rf_patio1');
            } else {
                $rfPatio1 = null;
            }

            // =======================================
            
            $rfPatio2 = '';
            if ($request->hasFile('rf_patio2')) {
                $rfPatio2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_patio2', 'rf_patio2');
            } else {
                $rfPatio2 = null;
            }

            // =======================================
            
            $rfPatio3 = '';
            if ($request->hasFile('rf_patio2')) {
                $rfPatio3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_patio3', 'rf_patio3');
            } else {
                $rfPatio3 = null;
            }

            // =======================================
            
            $rfEstudio1 = '';
            if ($request->hasFile('rf_estudio1')) {
                $rfEstudio1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_estudio1', 'rf_estudio1');
            } else {
                $rfEstudio1 = null;
            }

            // =======================================
            
            $rfEstudio2 = '';
            if ($request->hasFile('rf_estudio2')) {
                $rfEstudio2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_estudio2', 'rf_estudio2');
            } else {
                $rfEstudio2 = null;
            }

            // =======================================
            
            $rfEstudio3 = '';
            if ($request->hasFile('rf_estudio3')) {
                $rfEstudio3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_estudio3', 'rf_estudio3');
            } else {
                $rfEstudio3 = null;
            }

            // =======================================
            
            $rfCuartoUtil1 = '';
            if ($request->hasFile('rf_cuarto_util1')) {
                $rfCuartoUtil1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cuarto_util1', 'rf_cuarto_util1');
            } else {
                $rfCuartoUtil1 = null;
            }

            // =======================================
            
            $rfCuartoUtil2 = '';
            if ($request->hasFile('rf_cuarto_util2')) {
                $rfCuartoUtil2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cuarto_util2', 'rf_cuarto_util2');
            } else {
                $rfCuartoUtil2 = null;
            }

            // =======================================
            
            $rfCuartoUtil3 = '';
            if ($request->hasFile('rf_cuarto_util3')) {
                $rfCuartoUtil3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cuarto_util3', 'rf_cuarto_util3');
            } else {
                $rfCuartoUtil3 = null;
            }

            // =======================================
            
            $rfPasillo1 = '';
            if ($request->hasFile('rf_pasillo1')) {
                $rfPasillo1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_pasillo1', 'rf_pasillo1');
            } else {
                $rfPasillo1 = null;
            }

            // =======================================
            
            $rfPasillo2 = '';
            if ($request->hasFile('rf_pasillo2')) {
                $rfPasillo2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_pasillo2', 'rf_pasillo2');
            } else {
                $rfPasillo2 = null;
            }

            // =======================================
            
            $rfPasillo3 = '';
            if ($request->hasFile('rf_pasillo3')) {
                $rfPasillo3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_pasillo3', 'rf_pasillo3');
            } else {
                $rfPasillo3 = null;
            }

            // =======================================
            
            $rfZonaRopa1 = '';
            if ($request->hasFile('rf_zona_ropa1')) {
                $rfZonaRopa1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_zona_ropa1', 'rf_zona_ropa1');
            } else {
                $rfZonaRopa1 = null;
            }

            // =======================================
            
            $rfZonaRopa2 = '';
            if ($request->hasFile('rf_zona_ropa2')) {
                $rfZonaRopa2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_zona_ropa2', 'rf_zona_ropa2');
            } else {
                $rfZonaRopa2 = null;
            }

            // =======================================
            
            $rfZonaRopa3 = '';
            if ($request->hasFile('rf_zona_ropa3')) {
                $rfZonaRopa3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_zona_ropa3', 'rf_zona_ropa3');
            } else {
                $rfZonaRopa3 = null;
            }

            // =======================================
            
            $rfBalcon1 = '';
            if ($request->hasFile('rf_balcon1')) {
                $rfBalcon1 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_balcon1', 'rf_balcon1');
            } else {
                $rfBalcon1 = null;
            }

            // =======================================
            
            $rfBalcon2 = '';
            if ($request->hasFile('rf_balcon2')) {
                $rfBalcon2 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_balcon2', 'rf_balcon2');
            } else {
                $rfBalcon2 = null;
            }

            // =======================================
            
            $rfBalcon3 = '';
            if ($request->hasFile('rf_balcon3')) {
                $rfBalcon3 = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_balcon3', 'rf_balcon3');
            } else {
                $rfBalcon3 = null;
            }

            // =======================================
        

            $editarRegFotografico = RegistroFotografico::where('id_visita',$idVisita)
                ->update([
                    'rf_fachada' => $rfFachada,
                    'rf_entrada' => $rfEntrada,
                    'rf_sala1' => $rfSala1,
                    'rf_sala2' => $rfSala2,
                    'rf_sala3' => $rfSala3,
                    'rf_comedor1' => $rfComedor1,
                    'rf_comedor2' => $rfComedor2,
                    'rf_comedor3' => $rfComedor3,
                    'rf_cocina1' => $rfCocina1,
                    'rf_cocina2' => $rfCocina2,
                    'rf_cocina3' => $rfCocina3,
                    'rf_habitacion1' => $rfHabitacion1,
                    'rf_habitacion2' => $rfHabitacion2,
                    'rf_habitacion3' => $rfHabitacion3,
                    'rf_habitacion4' => $rfHabitacion4,
                    'rf_habitacion5' => $rfHabitacion5,
                    'rf_habitacion6' => $rfHabitacion6,
                    'rf_habitacion7' => $rfHabitacion7,
                    'rf_bano1' => $rfBano1,
                    'rf_bano2' => $rfBano2,
                    'rf_bano3' => $rfBano3,
                    'rf_patio1' => $rfPatio1,
                    'rf_patio2' => $rfPatio2,
                    'rf_patio3' => $rfPatio3,
                    'rf_estudio1' => $rfEstudio1,
                    'rf_estudio2' => $rfEstudio2,
                    'rf_estudio3' => $rfEstudio3,
                    'rf_cuarto_util1' => $rfCuartoUtil1,
                    'rf_cuarto_util2' => $rfCuartoUtil2,
                    'rf_cuarto_util3' => $rfCuartoUtil3,
                    'rf_pasillo1' => $rfPasillo1,
                    'rf_pasillo2' => $rfPasillo2,
                    'rf_pasillo3' => $rfPasillo3,
                    'rf_zona_ropa1' => $rfZonaRopa1,
                    'rf_zona_ropa2' => $rfZonaRopa2,
                    'rf_zona_ropa3' => $rfZonaRopa3,
                    'rf_balcon1' => $rfBalcon1,
                    'rf_balcon2' => $rfBalcon2,
                    'rf_balcon3' => $rfBalcon3,
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
