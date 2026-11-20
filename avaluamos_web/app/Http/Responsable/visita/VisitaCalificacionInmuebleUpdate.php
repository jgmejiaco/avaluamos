<?php

namespace App\Http\Responsable\visita;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaCalificacionInmuebleUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita                = request('id_visita', null);
        $calEstructura           = request('cal_estructura', null);
        $calPortonPpal           = request('cal_porton_ppal', null);
        $calFachada              = request('cal_fachada', null);
        $calPuertas              = request('cal_puertas', null);
        $calMuros                = request('cal_muros', null);
        $calVentaneria           = request('cal_ventaneria', null);
        $calTechos               = request('cal_techos', null);
        $calCarpinteria          = request('cal_carpinteria', null);
        $calPisos                = request('cal_pisos', null);
        $calVentilacion          = request('cal_ventilacion', null);
        $calCocina               = request('cal_cocina', null);
        $calIluminacion          = request('cal_iluminacion', null);
        $calBanios               = request('cal_banios', null);
        $calDistribucion         = request('cal_distribucion', null);
        $calZonaRopas            = request('cal_zona_ropas', null);
        $calPatios               = request('cal_patios', null);
        $calHumedades            = request('cal_humedades', null);
        $obsCalificacionInmueble = request('obs_calificacion_inmueble', null);

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('visita_calificacion_inmueble_update/'.$idVisita, [
                'json' => [
                    'cal_estructura'            => $calEstructura,
                    'cal_porton_ppal'           => $calPortonPpal,
                    'cal_fachada'               => $calFachada,
                    'cal_puertas'               => $calPuertas,
                    'cal_muros'                 => $calMuros,
                    'cal_ventaneria'            => $calVentaneria,
                    'cal_techos'                => $calTechos,
                    'cal_carpinteria'           => $calCarpinteria,
                    'cal_pisos'                 => $calPisos,
                    'cal_ventilacion'           => $calVentilacion,
                    'cal_cocina'                => $calCocina,
                    'cal_iluminacion'           => $calIluminacion,
                    'cal_banios'                => $calBanios,
                    'cal_distribucion'          => $calDistribucion,
                    'cal_zona_ropas'            => $calZonaRopas,
                    'cal_patios'                => $calPatios,
                    'cal_humedades'             => $calHumedades,
                    'obs_calificacion_inmueble' => $obsCalificacionInmueble,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Error al editar la Calificación Inmueble, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Calificación Inmueble editado satisfactoriamente');
            return redirect()->route('visita.edit', $idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect()->route('visita.edit', $idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaCalificacionInmuebleUpdate: '.$e->getMessage());
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
