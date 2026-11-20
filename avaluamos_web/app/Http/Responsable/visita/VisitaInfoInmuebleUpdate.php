<?php

namespace App\Http\Responsable\visita;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaInfoInmuebleUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita            = request('id_visita', null);
        $idTipoVivienda      = request('id_tipo_vivienda', null);
        $idUsoInmueble       = request('id_uso_inmueble', null);
        $idTipoSuelo         = request('id_tipo_suelo', null);
        $idTopografia        = request('id_topografia', null);
        $idForma             = request('id_forma', null);
        $pisosInmueble       = request('pisos_inmueble', null);
        $pisosEdificio       = request('pisos_edificio', null);
        $valorAdministracion = request('valor_administracion', null);
        $remodelado          = request('remodelado', null);
        $altura              = request('altura', null);
        $frente              = request('frente', null);
        $fondo               = request('fondo', null);
        $areaLibre           = request('area_libre', null);
        $aniosRemodelacion   = request('anios_remodelacion', null);
        $areaPatios          = request('area_patios', null);
        $idCondicionInmueble = request('id_condicion_inmueble', null);
        $obsInfoInmueble     = request('obs_info_inmueble', null);

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('visita_info_inmueble_update/'.$idVisita, [
                'json' => [
                    'id_tipo_vivienda'      => $idTipoVivienda,
                    'id_uso_inmueble'       => $idUsoInmueble,
                    'id_tipo_suelo'         => $idTipoSuelo,
                    'id_topografia'         => $idTopografia,
                    'id_forma'              => $idForma,
                    'pisos_inmueble'        => $pisosInmueble,
                    'pisos_edificio'        => $pisosEdificio,
                    'valor_administracion'  => $valorAdministracion,
                    'remodelado'            => $remodelado,
                    'altura'                => $altura,
                    'frente'                => $frente,
                    'fondo'                 => $fondo,
                    'area_libre'            => $areaLibre,
                    'anios_remodelacion'    => $aniosRemodelacion,
                    'area_patios'           => $areaPatios,
                    'id_condicion_inmueble' => $idCondicionInmueble,
                    'obs_info_inmueble'     => $obsInfoInmueble,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Error al editar la Información Inmueble, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Info Inmueble editada satisfactoriamente');
            return redirect()->route('visita.edit', $idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect()->route('visita.edit', $idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaInfoInmuebleUpdate: '.$e->getMessage());
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
