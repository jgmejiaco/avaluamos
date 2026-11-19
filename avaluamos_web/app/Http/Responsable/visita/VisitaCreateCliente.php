<?php

namespace App\Http\Responsable\visita;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaCreateCliente implements Responsable
{
    use MetodosTrait;

    protected $idCliente;

    public function __construct($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->post('visita_create_cliente/'.$this->idCliente);

            $respuesta = json_decode($response->getBody()->getContents());
            $crearVisitaCliente = $respuesta->crearVisitaCliente ?? null;

            if (! is_object($crearVisitaCliente) || ! isset($crearVisitaCliente->id_cliente)) {
                alert()->warning('No se encontró el cliente para crear la visita.');
                return redirect()->route('cliente_potencial.index');
            }

            return view('visita.create', compact('crearVisitaCliente'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaCreateCliente: '.$e->getMessage());
            alert()->error('Error consultando el cliente para crear la visita.');

            return redirect()->route('cliente_potencial.index');
        }
    }
}
