<?php

namespace App\Http\Responsable\avaluo;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoEdit implements Responsable
{
    use MetodosTrait;

    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->get('avaluo_edit/'.$this->idVisita);

            $respuesta = json_decode($response->getBody()->getContents());
            $calcularAvaluo = $respuesta->avaluo ?? null;

            if (! is_object($calcularAvaluo) || ! isset($calcularAvaluo->id_visita)) {
                alert()->warning('No se encontró el avalúo.');
                return redirect()->route('avaluos.index');
            }

            return view('avaluo.edit', compact('calcularAvaluo'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error AvaluoEdit: '.$e->getMessage());
            alert()->error('Error cargando el avalúo.');

            return redirect()->route('avaluos.index');
        }
    }
}
