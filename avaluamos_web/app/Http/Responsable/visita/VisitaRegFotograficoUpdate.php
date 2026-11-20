<?php

namespace App\Http\Responsable\visita;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\FileUploadTrait;
use App\Traits\MetodosTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaRegFotograficoUpdate implements Responsable
{
    use FileUploadTrait, MetodosTrait;

    public function toResponse($request)
    {
        $idVisita  = request('id_visita', null);
        $idCliente = request('id_cliente', null);

        // ==============================================================================

        try {
            $fechaActual  = Carbon::now()->format('d-m-Y_H_i_s');
            $baseFileName = "vis({$idVisita})_cli({$idCliente})_".$fechaActual;
            $carpetaArchivos = 'app/public/upfiles/visita';

            $datos = [];

            if ($request->hasFile('rf_fachada')) {
                $datos['rf_fachada'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_fachada', 'rf_fachada');
            }

            if ($request->hasFile('rf_entrada')) {
                $datos['rf_entrada'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_entrada', 'rf_entrada');
            }

            if ($request->hasFile('rf_sala1')) {
                $datos['rf_sala1'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_sala1', 'rf_sala1');
            }

            if ($request->hasFile('rf_sala2')) {
                $datos['rf_sala2'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_sala2', 'rf_sala2');
            }

            if ($request->hasFile('rf_sala3')) {
                $datos['rf_sala3'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_sala3', 'rf_sala3');
            }

            if ($request->hasFile('rf_comedor1')) {
                $datos['rf_comedor1'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_comedor1', 'rf_comedor1');
            }

            if ($request->hasFile('rf_comedor2')) {
                $datos['rf_comedor2'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_comedor2', 'rf_comedor2');
            }

            if ($request->hasFile('rf_comedor3')) {
                $datos['rf_comedor3'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_comedor3', 'rf_comedor3');
            }

            if ($request->hasFile('rf_cocina1')) {
                $datos['rf_cocina1'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cocina1', 'rf_cocina1');
            }

            if ($request->hasFile('rf_cocina2')) {
                $datos['rf_cocina2'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cocina2', 'rf_cocina2');
            }

            if ($request->hasFile('rf_cocina3')) {
                $datos['rf_cocina3'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cocina3', 'rf_cocina3');
            }

            if ($request->hasFile('rf_habitacion1')) {
                $datos['rf_habitacion1'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion1', 'rf_habitacion1');
            }

            if ($request->hasFile('rf_habitacion2')) {
                $datos['rf_habitacion2'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion2', 'rf_habitacion2');
            }

            if ($request->hasFile('rf_habitacion3')) {
                $datos['rf_habitacion3'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion3', 'rf_habitacion3');
            }

            if ($request->hasFile('rf_habitacion4')) {
                $datos['rf_habitacion4'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion4', 'rf_habitacion4');
            }

            if ($request->hasFile('rf_habitacion5')) {
                $datos['rf_habitacion5'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion5', 'rf_habitacion5');
            }

            if ($request->hasFile('rf_habitacion6')) {
                $datos['rf_habitacion6'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion6', 'rf_habitacion6');
            }

            if ($request->hasFile('rf_habitacion7')) {
                $datos['rf_habitacion7'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_habitacion7', 'rf_habitacion7');
            }

            if ($request->hasFile('rf_bano1')) {
                $datos['rf_bano1'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_bano1', 'rf_bano1');
            }

            if ($request->hasFile('rf_bano2')) {
                $datos['rf_bano2'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_bano2', 'rf_bano2');
            }

            if ($request->hasFile('rf_bano3')) {
                $datos['rf_bano3'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_bano3', 'rf_bano3');
            }

            if ($request->hasFile('rf_patio1')) {
                $datos['rf_patio1'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_patio1', 'rf_patio1');
            }

            if ($request->hasFile('rf_patio2')) {
                $datos['rf_patio2'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_patio2', 'rf_patio2');
            }

            if ($request->hasFile('rf_patio3')) {
                $datos['rf_patio3'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_patio3', 'rf_patio3');
            }

            if ($request->hasFile('rf_estudio1')) {
                $datos['rf_estudio1'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_estudio1', 'rf_estudio1');
            }

            if ($request->hasFile('rf_estudio2')) {
                $datos['rf_estudio2'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_estudio2', 'rf_estudio2');
            }

            if ($request->hasFile('rf_estudio3')) {
                $datos['rf_estudio3'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_estudio3', 'rf_estudio3');
            }

            if ($request->hasFile('rf_cuarto_util1')) {
                $datos['rf_cuarto_util1'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cuarto_util1', 'rf_cuarto_util1');
            }

            if ($request->hasFile('rf_cuarto_util2')) {
                $datos['rf_cuarto_util2'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cuarto_util2', 'rf_cuarto_util2');
            }

            if ($request->hasFile('rf_cuarto_util3')) {
                $datos['rf_cuarto_util3'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_cuarto_util3', 'rf_cuarto_util3');
            }

            if ($request->hasFile('rf_pasillo1')) {
                $datos['rf_pasillo1'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_pasillo1', 'rf_pasillo1');
            }

            if ($request->hasFile('rf_pasillo2')) {
                $datos['rf_pasillo2'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_pasillo2', 'rf_pasillo2');
            }

            if ($request->hasFile('rf_pasillo3')) {
                $datos['rf_pasillo3'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_pasillo3', 'rf_pasillo3');
            }

            if ($request->hasFile('rf_zona_ropa1')) {
                $datos['rf_zona_ropa1'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_zona_ropa1', 'rf_zona_ropa1');
            }

            if ($request->hasFile('rf_zona_ropa2')) {
                $datos['rf_zona_ropa2'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_zona_ropa2', 'rf_zona_ropa2');
            }

            if ($request->hasFile('rf_zona_ropa3')) {
                $datos['rf_zona_ropa3'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_zona_ropa3', 'rf_zona_ropa3');
            }

            if ($request->hasFile('rf_balcon1')) {
                $datos['rf_balcon1'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_balcon1', 'rf_balcon1');
            }

            if ($request->hasFile('rf_balcon2')) {
                $datos['rf_balcon2'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_balcon2', 'rf_balcon2');
            }

            if ($request->hasFile('rf_balcon3')) {
                $datos['rf_balcon3'] = $this->upfileWithName($baseFileName, $carpetaArchivos, $_FILES, 'rf_balcon3', 'rf_balcon3');
            }

            $response = $this->getClientApi()->put('visita_reg_fotografico_update/'.$idVisita, [
                'json' => $datos,
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Error al editar el Registro fotográfico, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Registro fotográfico editado satisfactoriamente');
            return redirect()->route('visita.edit', $idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect()->route('visita.edit', $idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaRegFotograficoUpdate: '.$e->getMessage());
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
