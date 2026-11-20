<?php

namespace App\Http\Responsable\avaluo;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoInfoJuridicaUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita               = request('id_visita', null);
        $propietario1           = strtoupper(request('propietario_1', null));
        $docPropietario1        = request('doc_propietario_1', null);
        $propietario2           = strtoupper(request('propietario_2', null));
        $docPropietario2        = request('doc_propietario_2', null);
        $matriculaInmueble      = request('matricula_inmueble', null);
        $coeficienteCopropiedad = request('coeficiente_copropiedad', null);
        $certificadoLibertad    = strtoupper(request('certificado_libertad', null));
        $escrituraPublica       = strtoupper(request('escritura_publica', null));
        $notaria                = strtoupper(request('notaria', null));
        $impuestoPredialAnual   = request('impuesto_predial_anual', null);
        $administracion         = request('administracion', null);
        $avaluoCatastral        = request('avaluo_catastral', null);
        $normasUsos             = request('normas_usos', null);
        $mejorMayorUso          = request('mejor_mayor_uso', null);

        // ==============================================================================
        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('avaluo_info_juridica_update/'.$idVisita, [
                'json' => [
                    'propietario1'            => $propietario1,
                    'doc_propietario1'        => $docPropietario1,
                    'propietario2'            => $propietario2,
                    'doc_propietario2'        => $docPropietario2,
                    'matricula_inmueble'      => $matriculaInmueble,
                    'coeficiente_copropiedad' => $coeficienteCopropiedad,
                    'certificado_libertad'    => $certificadoLibertad,
                    'escritura_publica'       => $escrituraPublica,
                    'notaria'                 => $notaria,
                    'imp_predial_anual'       => $impuestoPredialAnual,
                    'administracion'          => $administracion,
                    'avaluo_catastral'        => $avaluoCatastral,
                    'normas_usos'             => $normasUsos,
                    'mejor_mayor_uso'         => $mejorMayorUso,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Error al editar la Información Jurídica, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Info Jurídica editada satisfactoriamente');
            return redirect('calcular_avaluo/'.$idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect('calcular_avaluo/'.$idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error AvaluoInfoJuridicaUpdate: '.$e->getMessage());
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
