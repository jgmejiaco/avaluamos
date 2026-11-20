<?php

namespace App\Http\Responsable\calendario;

use App\Models\Calendario;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class CalendarioConsultarVisitaIndividual implements Responsable
{
    protected $idVisitaIndividual;

    public function __construct($idVisitaIndividual)
    {
        $this->idVisitaIndividual = $idVisitaIndividual;
    }

    public function toResponse($request)
    {
        try {
            $consultarVisitaCalendario = Calendario::leftJoin('tipo_inmueble', 'tipo_inmueble.id_tipo_inmueble', '=', 'calendario.tipo_inmueble')
                ->leftJoin('ciudad', 'ciudad.id_ciudad', '=', 'calendario.municipio')
                ->leftJoin('si_no', 'si_no.id_si_no', '=', 'calendario.visita_cumplida')
                ->leftJoin('departamento_estado', 'departamento_estado.id_departamento_estado', '=', 'ciudad.id_departamento_estado')
                ->select(
                    'id_visita_calendario',
                    'nombre_cliente',
                    'celular',
                    'calendario.tipo_inmueble as t_inmueble',
                    'tipo_inmueble.tipo_inmueble',
                    'municipio',
                    'descripcion_ciudad',
                    'calendario.barrio',
                    'calendario.direccion',
                    DB::raw('DATE_FORMAT(FROM_UNIXTIME(fecha_visita_calendario), "%Y-%m-%d %H:%i") as fecha_visita_calendario'),
                    'calendario.visita_cumplida',
                    'si_no.descripcion_si_no',
                    DB::raw("CONCAT(ciudad.descripcion_ciudad, '-', departamento_estado.descripcion_departamento) as ciudadDpto")
                )
                ->where('id_visita_calendario', $this->idVisitaIndividual)
                ->first();

            if (! $consultarVisitaCalendario) {
                return response()->json([
                    'success' => false,
                    'message' => 'No existe la visita del calendario',
                ], 404);
            }

            return response()->json([
                'visitaCalendario' => $consultarVisitaCalendario,
                'message'          => 'Visita del calendario obtenida correctamente',
                'success'          => true,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando la visita del calendario',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
