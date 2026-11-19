<?php

namespace App\Http\Responsable\cliente_potencial;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ClientePotencialIndex implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->get('cliente_potencial_index', [
                'query' => [],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());
            $clientes = $respuesta->clientes ?? [];

            return view('cliente_potencial.index', compact('clientes'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error ClientePotencialIndex: '.$e->getMessage());
            alert()->error('Error cargando los clientes potenciales.');

            return redirect()->route('cliente_potencial.index');
        }
    }
}
