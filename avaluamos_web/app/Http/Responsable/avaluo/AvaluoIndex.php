<?php

namespace App\Http\Responsable\avaluo;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoIndex implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->get('avaluos_index');

            $respuesta = json_decode($response->getBody()->getContents());
            $avaluosIndex = $respuesta->avaluos ?? [];

            return view('avaluo.index', compact('avaluosIndex'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error AvaluoIndex: '.$e->getMessage());
            alert()->error('Error cargando los avalúos.');

            return redirect()->route('inicio');
        }
    }
}
