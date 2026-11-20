<?php

namespace App\Http\Responsable\calendario;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class CalendarioStore implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $fechaVisita   = request('fecha_visita', null);
        $nombreCliente = request('nombre_cliente', null);
        $celular       = request('celular', null);
        $tipoInmueble  = request('tipo_inmueble', null);
        $ciudad        = request('ciudad', null);
        $barrio        = request('barrio', null);
        $direccion     = request('direccion', null);
        $visitado      = request('visitado', null);

        // ==============================================================================

        if (isset($fechaVisita) && ! is_null($fechaVisita) && ! empty($fechaVisita)) {
            $fechaVisita = strtotime($fechaVisita);
        } else {
            $fechaVisita = null;
        }

        // ==============================================================================

        if ($visitado != null || $visitado != '') {
            $visitado = request('visitado', null);
        } else {
            $visitado = 2;
        }

        // ==============================================================================

        try {
            $response = $this->getClientApi()->post('calendario_store', [
                'json' => [
                    'fecha_visita_calendario' => $fechaVisita,
                    'nombre_cliente'          => $nombreCliente,
                    'celular'                 => $celular,
                    'tipo_inmueble'           => $tipoInmueble,
                    'municipio'               => $ciudad,
                    'barrio'                  => $barrio,
                    'direccion'               => $direccion,
                    'visita_cumplida'         => $visitado,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (! empty($respuesta->success)) {
                return response()->json('visita_creada');
            }

            return response()->json('visita_no_creada');

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error CalendarioStore: '.$e->getMessage());
            return response()->json('error_exception');
        }
    }
}
