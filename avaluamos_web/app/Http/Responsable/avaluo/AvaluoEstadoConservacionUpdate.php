<?php

namespace App\Http\Responsable\avaluo;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoEstadoConservacionUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita                     = request('id_visita', null);
        $idFactorCalidad              = request('id_factor_calidad', null);
        $idFactorZona                 = request('id_factor_zona', null);
        $idFactorTiempo               = request('id_factor_tiempo', null);
        $idFactorPendiente            = request('id_factor_pendiente', null);
        $valorPendiente               = request('valor_pendiente', null);
        $idFactorUbicacion            = request('id_factor_ubicacion', null);
        $valorUbicacion               = request('valor_ubicacion', null);
        $idEstadoConservacionOpciones = request('id_estado_conservacion_opciones', null);

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('avaluo_estado_conservacion_update/'.$idVisita, [
                'json' => [
                    'id_factor_calidad'               => $idFactorCalidad,
                    'id_factor_zona'                  => $idFactorZona,
                    'id_factor_tiempo'                => $idFactorTiempo,
                    'id_factor_pendiente'             => $idFactorPendiente,
                    'valor_pendiente'                 => $valorPendiente,
                    'id_factor_ubicacion'             => $idFactorUbicacion,
                    'valor_ubicacion'                 => $valorUbicacion,
                    'id_estado_conservacion_opciones' => $idEstadoConservacionOpciones,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Error al editar el Estado de Conservación, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Estado de Conservación editado satisfactoriamente');
            return redirect('calcular_avaluo/'.$idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect('calcular_avaluo/'.$idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error AvaluoEstadoConservacionUpdate: '.$e->getMessage());
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
