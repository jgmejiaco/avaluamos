<?php

namespace App\Http\Responsable\calendario;

use App\Models\Calendario;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class CalendarioUpdate implements Responsable
{
    protected $idVisitaEditar;

    public function __construct($idVisitaEditar)
    {
        $this->idVisitaEditar = $idVisitaEditar;
    }

    public function toResponse($request)
    {
        try {
            $editarVisitaCalendario = Calendario::where('id_visita_calendario', $this->idVisitaEditar)
                ->update([
                    'fecha_visita_calendario' => request('fecha_visita_calendario', null),
                    'nombre_cliente'          => request('nombre_cliente', null),
                    'celular'                 => request('celular', null),
                    'tipo_inmueble'           => request('tipo_inmueble', null),
                    'municipio'               => request('municipio', null),
                    'barrio'                  => request('barrio', null),
                    'direccion'               => request('direccion', null),
                    'visita_cumplida'         => request('visita_cumplida', null),
                ]);

            if (! $editarVisitaCalendario) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se pudo editar la visita del calendario',
                ], 400);
            }

            return response()->json([
                'success'              => true,
                'message'              => 'Visita de calendario editada satisfactoriamente',
                'id_visita_calendario' => $this->idVisitaEditar,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar la visita del calendario',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
