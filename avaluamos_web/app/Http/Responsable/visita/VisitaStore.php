<?php

namespace App\Http\Responsable\visita;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaStore implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idCliente           = request('id_cliente', null);
        $dirigidoA           = request('dirigido_a', null);
        $tipoDocEmpresa      = request('tipo_doc_empresa', null);
        $docDirigidoA        = request('doc_dirigido_a', null);
        $objetoAvaluoCheck   = request('objeto_avaluo', []);
        $objetoAvaluoCheck   = implode(', ', $objetoAvaluoCheck);
        $objetoAvaluo        = $objetoAvaluoCheck;
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
        $porcentajeDescuento = request('porcentaje_descuento', null);
        $valorCotizacion     = request('valor_cotizacion', null);
        $latitud             = request('latitud', null);
        $longitud            = request('longitud', null);
        $obserVisitaTecnica  = request('obser_visita_tecnica', null);
        $visitado            = request('visitado', null);
        $fechaVisita         = request('fecha_visita', null);
        $horaVisita          = request('hora_visita', null);
        $visitador           = request('visitador', null);
        $usuLogueado         = session('id_usuario');

        // ==============================================================================

        if ($dirigidoA != "-1" || $dirigidoA != -1) {
            $dirigidoA = request('dirigido_a', null);
        } else {
            $dirigidoA = 0;
        }

        // ==============================

        if ($tipoDocEmpresa != "-1" || $tipoDocEmpresa != -1) {
            $tipoDocEmpresa = request('tipo_doc_empresa', null);
        } else {
            $tipoDocEmpresa = null;
        }

        // ==============================

        if ($pais != "-1" || $pais != -1) {
            $pais = request('pais', null);
        } else {
            $pais = null;
        }

        // ==============================

        if ($departamento != "-1" || $departamento != -1) {
            $departamento = request('departamento', null);
        } else {
            $departamento = null;
        }

        // ==============================

        if ($ciudad != "-1" || $ciudad != -1) {
            $ciudad = request('ciudad', null);
        } else {
            $ciudad = null;
        }

        // ==============================

        if ($comuna != "-1" || $comuna != -1) {
            $comuna = request('comuna', null);
        } else {
            $comuna = null;
        }

        // ==============================

        if ($tipoInmueble != "-1" || $tipoInmueble != -1) {
            $tipoInmueble = request('tipo_inmueble', null);
        } else {
            $tipoInmueble = null;
        }

        // ==============================

        if ($area != "0.0" || $area != 0.0) {
            $area = request('area', null);
        } else {
            $area = null;
        }

        // ==============================

        if ($visitado != "-1" || $visitado != -1) {
            $visitado = request('visitado', null);
        } else {
            $visitado = 2;
        }

        // ==============================

        if ($visitador != "-1" || $visitador != -1) {
            $visitador = request('visitador', null);
        } else {
            $visitador = null;
        }

        // ==============================

        if (isset($fechaVisita) && ! is_null($fechaVisita) && ! empty($fechaVisita)) {
            $fechaVisita = strtotime($fechaVisita);
        } else {
            $fechaVisita = null;
        }

        // ==============================================================================

        try {
            $response = $this->getClientApi()->post('visitas_store', [
                'json' => [
                    'id_cliente'           => $idCliente,
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
                    'porcentaje_descuento' => $porcentajeDescuento,
                    'valor_cotizacion'     => $valorCotizacion,
                    'latitud'              => $latitud,
                    'longitud'             => $longitud,
                    'obser_visita_tecnica' => $obserVisitaTecnica,
                    'visitado'             => $visitado,
                    'fecha_visita'         => $fechaVisita,
                    'hora_visita'          => $horaVisita,
                    'visitador'            => $visitador,
                    'usu_logueado'         => $usuLogueado,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'Ha ocurrido un error al crear la visita, por favor contacte a Soporte.'
                );
            }

            alert()->success('Proceso Exitoso', 'Visita creada satisfactoriamente');
            return redirect()->to(route('visita.index'));

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return back();

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaStore: '.$e->getMessage());
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
