<?php

namespace App\Http\Responsable\avaluo;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoVisitaTecnicaUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idVisita            = request('id_visita', null);
        $dirigidoA           = request('dirigido_a', null);
        $tipoDocEmpresa      = request('tipo_doc_empresa', null);
        $docDirigidoA        = request('doc_dirigido_a', null);
        $objetoAvaluoEdit    = request('objeto_avaluo', []);
        $objetoAvaluoEdit    = implode(', ', $objetoAvaluoEdit);
        $objetoAvaluo        = $objetoAvaluoEdit;
        $pais                = request('pais', null);
        $departamento        = request('departamento', null);
        $ciudad              = request('ciudad', null);
        $comuna              = request('comuna', null);
        $sector              = strtoupper(request('sector', null));
        $cercaDe             = strtoupper(request('cerca_de', null));
        $barrio              = strtoupper(request('barrio', null));
        $unidadEdificio      = strtoupper(request('unidad_edificio', null));
        $direccion           = strtoupper(request('direccion', null));
        $tipoInmueble        = request('tipo_inmueble', null);
        $area                = doubleval(request('area', null));
        $estrato             = request('estrato', null);
        $numeroInmueble      = strtoupper(request('numero_inmueble', null));
        $latitud             = request('latitud', null);
        $longitud            = request('longitud', null);
        $porcentajeDescuento = request('porcentaje_descuento', null);
        $valorCotizacion     = request('valor_cotizacion', null);
        $obserVisitaTecnica  = request('obser_visita_tecnica', null);
        $visitado            = request('visitado', null);
        $fechaVisita         = request('fecha_visita', null);
        $horaVisita          = request('hora_visita', null);
        $visitador           = request('visitador', null);

        // ==============================================================================

        if (isset($fechaVisita) && ! is_null($fechaVisita) && ! empty($fechaVisita)) {
            $fechaVisita = strtotime($fechaVisita);
        } else {
            $fechaVisita = null;
        }

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('avaluo_tecnica_update/'.$idVisita, [
                'json' => [
                    'dirigido_a'           => $dirigidoA,
                    'tipo_doc_empresa'     => $tipoDocEmpresa,
                    'doc_dirigido_a'       => $docDirigidoA,
                    'objeto_avaluo'        => $objetoAvaluo,
                    'pais'                 => $pais,
                    'departamento'         => $departamento,
                    'ciudad'               => $ciudad,
                    'comuna'               => $comuna,
                    'sector'               => $sector,
                    'cerca_de'             => $cercaDe,
                    'barrio'               => $barrio,
                    'unidad_edificio'      => $unidadEdificio,
                    'direccion'            => $direccion,
                    'tipo_inmueble'        => $tipoInmueble,
                    'area'                 => $area,
                    'estrato'              => $estrato,
                    'numero_inmueble'      => $numeroInmueble,
                    'latitud'              => $latitud,
                    'longitud'             => $longitud,
                    'porcentaje_descuento' => $porcentajeDescuento,
                    'valor_cotizacion'     => $valorCotizacion,
                    'obser_visita_tecnica' => $obserVisitaTecnica,
                    'visitado'             => $visitado,
                    'fecha_visita'         => $fechaVisita,
                    'hora_visita'          => $horaVisita,
                    'visitador'            => $visitador,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Ha ocurrido un error al editar la visita, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Visita Técnica editada satisfactoriamente');
            return redirect('calcular_avaluo/'.$idVisita);

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return redirect('calcular_avaluo/'.$idVisita);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error AvaluoVisitaTecnicaUpdate: '.$e->getMessage());
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
