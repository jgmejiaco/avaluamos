<?php

namespace App\Http\Responsable\cliente_potencial;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ClientePotencialEdit implements Responsable
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

            $cliente->fecha_nacimiento = $this->formatearFechaNacimiento($cliente->fecha_nacimiento ?? null);

            return view('cliente_potencial.edit', compact('cliente'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error ClientePotencialEdit: '.$e->getMessage());
            alert()->error('Error', 'No fue posible cargar el cliente potencial.');
            return redirect()->route('cliente_potencial.index');
        }
    }

    private function formatearFechaNacimiento($fecha): ?string
    {
        if ($fecha === null || $fecha === '') {
            return null;
        }

        if (is_numeric($fecha)) {
            return date('Y-m-d', (int) $fecha);
        }

        $timestamp = strtotime((string) $fecha);

        return $timestamp ? date('Y-m-d', $timestamp) : null;
    }
}
