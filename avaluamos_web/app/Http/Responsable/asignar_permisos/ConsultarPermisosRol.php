<?php

namespace App\Http\Responsable\asignar_permisos;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ConsultarPermisosRol implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idRol = $request->input('id_rol');

        if (! $idRol) {
            return response()->json([
                'success' => false,
                'message' => 'Rol requerido',
            ], 422);
        }

        try {
            $response = $this->getClientApi()->get('consultar_permisos_rol', [
                'query' => [
                    'id_rol' => $idRol,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents());

            return response()->json($data);
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            return response()->json([
                'success' => false,
                'message' => 'Error consultando permisos del rol',
            ], 500);
        }
    }
}
