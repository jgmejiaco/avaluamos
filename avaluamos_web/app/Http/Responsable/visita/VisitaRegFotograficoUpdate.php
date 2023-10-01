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

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $fechaActual = Carbon::now();
            $fechaActual = $fechaActual->format('d-m-Y_H:m:s');
            $baseFileName = "vis({$idVisita})_cli({$idCliente})_".$fechaActual;

            // $carpetaArchivos = '/upfiles/visita';
            // $carpetaArchivos = storage_path('app/public/');
            $carpetaArchivos = storage_path('/upfiles/visita');

            $rfFachada= '';
            if ($request->hasFile('rf_fachada')) {
                $rfFachada = $this->upfileWithName($baseFileName, $carpetaArchivos, $request, 'rf_fachada', 'fachada');
                // $rfFachada = $this->uploadFile($request, 'xml_evento', $carpeta_archivos);
                // !Storage::exists($factura->ruta_archivo) ?: Storage::delete($factura->ruta_archivo);
                // $rfFachada = $this->uploadFile($request, 'archivo', 'upfilesspe/contabilidad/facturas');
                // $poliza = storage_path('app/public/'. $archivos_poliza[0]['archivo']);

                // if(file_exists($archivo_matricula)){
                //     unlink($archivo_matricula);
                // }

            } else {
                $rfFachada = null;
            }

            $rfEntrada= '';
            if ($request->hasFile('rf_entrada')) {
                $rfEntrada = $this->upfileWithName($baseFileName, $carpetaArchivos, $request, 'rf_entrada', 'entrada');
            } else {
                $rfEntrada = null;
            }

            $editarRegFotografico = RegistroFotografico::where('id_visita',$idVisita)
                ->update([
                    'rf_fachada' => $rfFachada,
                    'rf_entrada' => $rfEntrada,
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
