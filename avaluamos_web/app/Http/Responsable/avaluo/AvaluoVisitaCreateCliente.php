<?php

namespace App\Http\Responsable\avaluo;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoVisitaCreateCliente implements Responsable
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
            $response = $this->getClientApi()->post('avaluo_visita_create_cliente/'.$this->idVisita);

            $respuesta = json_decode($response->getBody()->getContents());
            $crearAvaluoVisitaCliente = $respuesta->crearAvaluoVisitaCliente ?? null;

            if (! is_object($crearAvaluoVisitaCliente) || ! isset($crearAvaluoVisitaCliente->id_cliente)) {
                alert()->warning('No se encontró el cliente para el avalúo.');
                return redirect()->route('avaluos.index');
            }

            return view('avaluo.create', compact('crearAvaluoVisitaCliente'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error AvaluoVisitaCreateCliente: '.$e->getMessage());
            alert()->error('Error consultando el cliente para el avalúo.');

            return redirect()->route('avaluos.index');
        }
    }
}
