<?php

namespace App\Http\Responsable\calendario;

use App\Models\Calendario;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class CalendarioStore implements Responsable
{
    public function toResponse($request)
    {
        try {
            $visitaCalendario = Calendario::create([
                'fecha_visita_calendario' => request('fecha_visita_calendario', null),
                'nombre_cliente'          => request('nombre_cliente', null),
                'celular'                 => request('celular', null),
                'tipo_inmueble'           => request('tipo_inmueble', null),
                'municipio'               => request('municipio', null),
                'barrio'                  => request('barrio', null),
                'direccion'               => request('direccion', null),
                'visita_cumplida'         => request('visita_cumplida', null),
            ]);

            if (! $visitaCalendario) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se pudo crear la visita del calendario',
                ], 400);
            }

            return response()->json([
                'success'              => true,
                'message'              => 'Visita de calendario creada satisfactoriamente',
                'id_visita_calendario' => $visitaCalendario->id_visita_calendario,
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al crear la visita del calendario',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
