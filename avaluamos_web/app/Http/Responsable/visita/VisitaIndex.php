<?php

namespace App\Http\Responsable\visita;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaIndex implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->get('visitas_index', [
                'query' => [],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());
            $todasVisitas = $respuesta->visitas ?? [];

            return view('visita.index', compact('todasVisitas'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaIndex: '.$e->getMessage());
            alert()->error('Error cargando las visitas.');

            return redirect()->route('inicio');
        }
    }
}
