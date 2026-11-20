<?php

namespace App\Http\Responsable\visita;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaObserGeneralesUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita               = request('id_visita', null);
        $observacionesGenerales = request('observaciones_generales', null);

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('visita_obser_generales_update/'.$idVisita, [
                'json' => [
                    'observaciones_generales' => $observacionesGenerales,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Error al editar las Observaciones Generales, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Observaciones Generales editada satisfactoriamente');
            return redirect()->route('visita.edit', $idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect()->route('visita.edit', $idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaObserGeneralesUpdate: '.$e->getMessage());
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
