<?php

namespace App\Http\Responsable\avaluo;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoValorEstimadoUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita              = request('id_visita', null);
        $valorEstimadoInmueble = request('valor_estimado_inmueble', null);

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('avaluo_valor_estimado_update/'.$idVisita, [
                'json' => [
                    'valor_estimado_inmueble' => $valorEstimadoInmueble,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Error al editar el Valor Estimado Avalúo, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Valor Estimado Avalúo editado satisfactoriamente');
            return redirect('calcular_avaluo/'.$idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect('calcular_avaluo/'.$idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error AvaluoValorEstimadoUpdate: '.$e->getMessage());
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
