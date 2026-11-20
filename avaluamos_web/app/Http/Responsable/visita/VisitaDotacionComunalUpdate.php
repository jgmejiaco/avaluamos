<?php

namespace App\Http\Responsable\visita;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaDotacionComunalUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita           = request('id_visita', null);
        $porteria24         = request('porteria_24', null);
        $parqueoComun       = request('parqueo_comun', null);
        $juegosInfantiles   = request('juegos_infantiles', null);
        $zonaMascotas       = request('zona_mascotas', null);
        $piscinas           = request('piscinas', null);
        $zonasVerdes        = request('zonas_verdes', null);
        $sauna              = request('sauna', null);
        $salonSocial        = request('salon_social', null);
        $turco              = request('turco', null);
        $canchas            = request('canchas', null);
        $gimnasio           = request('gimnasio', null);
        $playground         = request('playground', null);
        $barbecue           = request('barbecue', null);
        $supermercado       = request('supermercado', null);
        $salaCine           = request('sala_cine', null);
        $cafeteria          = request('cafeteria', null);
        $restaurante        = request('restaurante', null);
        $squash             = request('squash', null);
        $obsDotacionComunal = request('obs_dotacion_comunal', null);

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('visita_dotacion_comunal_update/'.$idVisita, [
                'json' => [
                    'porteria_24'          => $porteria24,
                    'parqueo_comun'        => $parqueoComun,
                    'juegos_infantiles'    => $juegosInfantiles,
                    'zona_mascotas'        => $zonaMascotas,
                    'piscinas'             => $piscinas,
                    'zonas_verdes'         => $zonasVerdes,
                    'sauna'                => $sauna,
                    'salon_social'         => $salonSocial,
                    'turco'                => $turco,
                    'canchas'              => $canchas,
                    'gimnasio'             => $gimnasio,
                    'playground'           => $playground,
                    'barbecue'             => $barbecue,
                    'supermercado'         => $supermercado,
                    'sala_cine'            => $salaCine,
                    'cafeteria'            => $cafeteria,
                    'restaurante'          => $restaurante,
                    'squash'               => $squash,
                    'obs_dotacion_comunal' => $obsDotacionComunal,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Error al editar la Dotación Comunal, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Dotación Comunal editado satisfactoriamente');
            return redirect()->route('visita.edit', $idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect()->route('visita.edit', $idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaDotacionComunalUpdate: '.$e->getMessage());
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
