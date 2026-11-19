<?php

namespace App\Http\Responsable\cliente_potencial;

use App\Models\Ciudad;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ClienteConsultarCiudadDpto implements Responsable
{
    public function toResponse($request)
    {
        try {
            $idDpto = request('id_dpto', null);

            $clienteCiudadesDpto = Ciudad::select(
                    'id_ciudad',
                    'descripcion_ciudad'
                )
                ->where('id_departamento_estado', $idDpto)
                ->orderBy('descripcion_ciudad', 'asc')
                ->get();

            return response()->json([
                'clienteCiudadesDpto' => $clienteCiudadesDpto,
                'message'              => 'Ciudades del departamento obtenidas correctamente',
                'success'              => true,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando las ciudades del departamento para crear el cliente potencial',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
