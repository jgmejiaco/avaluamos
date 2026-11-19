<?php

namespace App\Http\Responsable\cliente_potencial;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ClientePotencialShow implements Responsable
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
            $response = $this->getClientApi()->get('cliente_potencial_edit/'.$this->idCliente);

            $cliente = json_decode($response->getBody()->getContents());

            if (! is_object($cliente) || ! isset($cliente->id_cliente)) {
                alert()->warning('No se encontró el cliente potencial.');
                return redirect()->route('cliente_potencial.index');
            }

            return view('cliente_potencial.cliente_historial', compact('cliente'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error ClientePotencialShow: '.$e->getMessage());
            alert()->error('Error', 'No fue posible cargar el historial del cliente.');
            return redirect()->route('cliente_potencial.index');
        }
    }
}
