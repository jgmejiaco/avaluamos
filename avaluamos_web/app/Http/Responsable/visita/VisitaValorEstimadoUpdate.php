<?php

namespace App\Http\Responsable\visita;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaValorEstimadoUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita              = request('id_visita', null);
        $valorEstimadoInmueble = request('valor_estimado_inmueble', null);

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('visita_valor_estimado_update/'.$idVisita, [
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
            return redirect()->route('visita.edit', $idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect()->route('visita.edit', $idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaValorEstimadoUpdate: '.$e->getMessage());
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
