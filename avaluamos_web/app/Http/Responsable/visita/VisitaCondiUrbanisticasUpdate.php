<?php

namespace App\Http\Responsable\visita;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaCondiUrbanisticasUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita                   = request('id_visita', null);
        $idValorizacion             = request('id_valorizacion', null);
        $cuAlumbradoPublico         = request('cu_alumbrado_publico', null);
        $cuTransporte               = request('cu_transporte', null);
        $cuOrdenPublico             = request('cu_orden_publico', null);
        $cuSeguridad                = request('cu_seguridad', null);
        $cuSalubridad               = request('cu_salubridad', null);
        $cuVias                     = request('cu_vias', null);
        $idTipoVias                 = request('id_tipo_vias', null);
        $cuAceras                   = request('cu_aceras', null);
        $cuRedGas                   = request('cu_red_gas', null);
        $cuRedTelco                 = request('cu_red_telco', null);
        $cuRedAcueducto             = request('cu_red_acueducto', null);
        $cuRedAlcantarillado        = request('cu_red_alcantarillado', null);
        $cuBarriosSectores          = request('cu_barrios_sectores', null);
        $cuTipoEdificaciones        = request('cu_tipo_edificaciones', null);
        $obsCondicionesUrbanisticas = request('obs_condiciones_urbanisticas', null);

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('visita_condi_urbanisticas_update/'.$idVisita, [
                'json' => [
                    'id_valorizacion'              => $idValorizacion,
                    'cu_alumbrado_publico'         => $cuAlumbradoPublico,
                    'cu_transporte'                => $cuTransporte,
                    'cu_orden_publico'             => $cuOrdenPublico,
                    'cu_seguridad'                 => $cuSeguridad,
                    'cu_salubridad'                => $cuSalubridad,
                    'cu_vias'                      => $cuVias,
                    'id_tipo_vias'                 => $idTipoVias,
                    'cu_aceras'                    => $cuAceras,
                    'cu_red_gas'                   => $cuRedGas,
                    'cu_red_telco'                 => $cuRedTelco,
                    'cu_red_acueducto'             => $cuRedAcueducto,
                    'cu_red_alcantarillado'        => $cuRedAlcantarillado,
                    'cu_barrios_sectores'          => $cuBarriosSectores,
                    'cu_tipo_edificaciones'        => $cuTipoEdificaciones,
                    'obs_condiciones_urbanisticas' => $obsCondicionesUrbanisticas,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Error al editar la Condición Urbanística, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Condiciones Urbanísticas editada satisfactoriamente');
            return redirect()->route('visita.edit', $idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect()->route('visita.edit', $idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaCondiUrbanisticasUpdate: '.$e->getMessage());
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
