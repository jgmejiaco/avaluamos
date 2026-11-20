<?php

namespace App\Http\Responsable\calendario;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class CalendarioUpdate implements Responsable
{
    use MetodosTrait;

    protected $idCalendario;

    public function __construct($idCalendario)
    {
        $this->idCalendario = $idCalendario;
    }

    public function toResponse($request)
    {
        $idVisitaEditar      = $this->idCalendario;
        $fechaVisitaEditar   = request('fecha_visita_editar', null);
        $nombreClienteEditar = request('nombre_cliente_editar', null);
        $celularEditar       = request('celular_editar', null);
        $tipoInmuebleEditar  = request('tipo_inmueble_editar', null);
        $ciudadEditar        = request('ciudad_editar', null);
        $barrioEditar        = request('barrio_editar', null);
        $direccionEditar     = request('direccion_editar', null);
        $visitadoEditar      = request('visitado_editar', null);

        // ==============================================================================

        if (isset($fechaVisitaEditar) && ! is_null($fechaVisitaEditar) && ! empty($fechaVisitaEditar)) {
            $fechaVisitaEditar = strtotime($fechaVisitaEditar);
        } else {
            $fechaVisitaEditar = null;
        }

        // ==============================================================================

        if ($visitadoEditar != null || $visitadoEditar != '') {
            $visitadoEditar = request('visitado_editar', null);
        } else {
            $visitadoEditar = 2;
        }

        // ==============================================================================

        try {
            $response = $this->getClientApi()->put('calendario_update/'.$idVisitaEditar, [
                'json' => [
                    'fecha_visita_calendario' => $fechaVisitaEditar,
                    'nombre_cliente'          => $nombreClienteEditar,
                    'celular'                 => $celularEditar,
                    'tipo_inmueble'           => $tipoInmuebleEditar,
                    'municipio'               => $ciudadEditar,
                    'barrio'                  => $barrioEditar,
                    'direccion'               => $direccionEditar,
                    'visita_cumplida'         => $visitadoEditar,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (! empty($respuesta->success)) {
                return response()->json('visita_editada');
            }

            return response()->json('visita_no_editada');

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error CalendarioUpdate: '.$e->getMessage());
            return response()->json('error_exception');
        }
    }
}
