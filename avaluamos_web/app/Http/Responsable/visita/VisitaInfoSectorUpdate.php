<?php

namespace App\Http\Responsable\visita;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaInfoSectorUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita              = request('id_visita', null);
        $barriosSectores       = request('barrios_sectores', null);
        $actividadPredominante = request('actividad_predominante', null);
        $transporte            = request('transporte', null);
        $viasAcceso            = request('vias_acceso', null);

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('visita_info_sector_update/'.$idVisita, [
                'json' => [
                    'barrios_sectores'       => $barriosSectores,
                    'actividad_predominante' => $actividadPredominante,
                    'transporte'             => $transporte,
                    'vias_acceso'            => $viasAcceso,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Error al editar la Info Sector, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Info Sector editada satisfactoriamente');
            return redirect()->route('visita.edit', $idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect()->route('visita.edit', $idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaInfoSectorUpdate: '.$e->getMessage());
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
