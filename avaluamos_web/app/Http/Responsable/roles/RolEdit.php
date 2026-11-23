<?php

namespace App\Http\Responsable\roles;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class RolEdit implements Responsable
{
    use MetodosTrait;

    protected $idRol;

    public function __construct($idRol)
    {
        $this->idRol = $idRol;
    }

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->get('rol_edit/'.$this->idRol);
            $rol = json_decode($response->getBody()->getContents());

            if (! is_object($rol) || empty($rol->id)) {
                alert()->error('Error', 'Rol no encontrado.');
                return redirect()->route('roles.index');
            }

            return view('roles.partials.modal_editar_rol', compact('rol'));
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            alert()->error('Error', 'No se pudo cargar el rol.');
            return redirect()->route('roles.index');
        }
    }
}
