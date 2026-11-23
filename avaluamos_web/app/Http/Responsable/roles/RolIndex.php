<?php

namespace App\Http\Responsable\roles;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class RolIndex implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->get('rol_index');
            $roles = collect(json_decode($response->getBody()->getContents()));

            return view('roles.index', compact('roles'));
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            alert()->error('Error', 'No se pudieron consultar los roles.');
            return redirect()->route('home.index');
        }
    }
}
