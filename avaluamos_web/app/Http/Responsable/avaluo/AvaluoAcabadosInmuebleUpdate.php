<?php

namespace App\Http\Responsable\avaluo;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoAcabadosInmuebleUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita              = request('id_visita', null);
        $idSistemaConstructivo = request('id_sistema_constructivo', null);
        $portonPrincipal       = request('porton_principal', null);
        $idTipoFachada         = request('id_tipo_fachada', null);
        $puertas               = request('puertas', null);
        $idTipoMuro            = request('id_tipo_muro', null);
        $idVentaneria          = request('id_ventaneria', null);
        $idTipoTecho           = request('id_tipo_techo', null);
        $serviciosPublicios    = request('servicios_publicos', null);
        $pisos                 = request('pisos', null);
        $telefono              = request('telefono', null);
        $banios                = request('banios', null);
        $energia               = request('energia', null);
        $cocina                = request('cocina', null);
        $agua                  = request('agua', null);
        $meson                 = request('meson', null);
        $gas                   = request('gas', null);
        $patios                = request('patios', null);
        $obsAcabadosInmueble   = request('obs_acabados_inmueble', null);

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('avaluo_acabados_inmueble_update/'.$idVisita, [
                'json' => [
                    'id_sistema_constructivo' => $idSistemaConstructivo,
                    'porton_principal'        => $portonPrincipal,
                    'id_tipo_fachada'         => $idTipoFachada,
                    'puertas'                 => $puertas,
                    'id_tipo_muro'            => $idTipoMuro,
                    'id_ventaneria'           => $idVentaneria,
                    'id_tipo_techo'           => $idTipoTecho,
                    'servicios_publicos'      => $serviciosPublicios,
                    'pisos'                   => $pisos,
                    'telefono'                => $telefono,
                    'banios'                  => $banios,
                    'energia'                 => $energia,
                    'cocina'                  => $cocina,
                    'agua'                    => $agua,
                    'meson'                   => $meson,
                    'gas'                     => $gas,
                    'patios'                  => $patios,
                    'obs_acabados_inmueble'   => $obsAcabadosInmueble,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Error al editar los Acabados Inmueble, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Acabados Inmueble editado satisfactoriamente');
            return redirect('calcular_avaluo/'.$idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect('calcular_avaluo/'.$idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error AvaluoAcabadosInmuebleUpdate: '.$e->getMessage());
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
