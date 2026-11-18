<?php

namespace App\Http\Responsable\usuarios;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class UsuarioIndex implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->get('usuarios_index', [
                'query' => [],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());
            $usuarios = $respuesta->usuarios ?? [];

            return view('usuarios.index', compact('usuarios'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error UsuarioIndex: '.$e->getMessage());
            alert()->error('Error cargando los usuarios.');

            return redirect()->route('inicio');
        }
    }
}
