<?php

namespace App\Http\Responsable\usuarios;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class UsuarioEdit implements Responsable
{
    use MetodosTrait;

    protected $idUsuario;

    public function __construct($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function toResponse($request)
    {
        try {
            // Debe coincidir con la ruta API: GET api/usuario_edit/{idUsuario}
            $response = $this->getClientApi()->get('usuario_edit/'.$this->idUsuario);

            $usuario = json_decode($response->getBody()->getContents());

            // No usar empty() sobre el id: empty(0) === true en PHP
            if (! is_object($usuario) || ! isset($usuario->id_usuario)) {
                return response(
                    '<div class="alert alert-warning m-3">No se encontró el usuario.</div>',
                    404
                );
            }

            return view('usuarios.modal_editar_usuario', compact('usuario'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error UsuarioEdit: '.$e->getMessage());

            // Esta acción se llama por AJAX: no redirigir
            return response(
                '<div class="alert alert-danger m-3">Error al cargar el formulario de edición.</div>',
                500
            );
        }
    }
}
