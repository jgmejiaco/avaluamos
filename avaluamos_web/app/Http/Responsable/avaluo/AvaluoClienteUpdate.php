<?php

namespace App\Http\Responsable\avaluo;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoClienteUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita           = request('id_visita', null);
        $idCliente          = request('id_cliente', null);
        $cliNombres         = strtoupper(request('cli_nombres', null));
        $cliTipoDoc         = request('cli_tipo_doc', null);
        $docCliente         = request('doc_cliente', null);
        $fechaNacimiento    = request('fecha_nacimiento', null);
        $cliCelular         = request('cli_celular', null);
        $cliCorreo          = request('cli_correo', null);
        $tipoPersona        = request('tipo_persona', null);
        $cliPais            = request('cli_pais', null);
        $cliDpto            = request('cli_dpto', null);
        $cliCiudad          = request('cli_ciudad', null);
        $referidoPor        = request('referido_por', null);
        $redSocial          = request('red_social', null);
        $nombreQuienRefiere = request('nombre_quien_refiere', null);
        $empresaQueRefiere  = request('empresa_que_refiere', null);

        // ==============================================================================

        if (isset($fechaNacimiento) && ! is_null($fechaNacimiento) && ! empty($fechaNacimiento)) {
            $fechaNacimiento = strtotime($fechaNacimiento);
        } else {
            $fechaNacimiento = null;
        }

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('avaluo_update/'.$idVisita, [
                'json' => [
                    'id_cliente'           => $idCliente,
                    'cli_nombres'          => $cliNombres,
                    'id_doc_cliente'       => $cliTipoDoc,
                    'documento_cliente'    => $docCliente,
                    'fecha_nacimiento'     => $fechaNacimiento,
                    'cli_celular'          => $cliCelular,
                    'cli_email'            => $cliCorreo,
                    'id_tipo_persona'      => $tipoPersona,
                    'id_pais'              => $cliPais,
                    'id_dpto_estado'       => $cliDpto,
                    'id_ciudad'            => $cliCiudad,
                    'id_referido_por'      => $referidoPor,
                    'id_red_social'        => $redSocial,
                    'nombre_quien_refiere' => $nombreQuienRefiere,
                    'empresa_que_refiere'  => $empresaQueRefiere,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Ha ocurrido un error al editar el cliente la visita, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Cliente editado satisfactoriamente');
            return redirect('calcular_avaluo/'.$idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect('calcular_avaluo/'.$idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error AvaluoClienteUpdate: '.$e->getMessage());
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
