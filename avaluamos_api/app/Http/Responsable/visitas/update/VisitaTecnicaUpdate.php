<?php

namespace App\Http\Responsable\visitas\update;

use App\Models\Visita;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaTecnicaUpdate implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        $visita = Visita::where('id_visita', $this->idVisita)
            ->whereNull('deleted_at')
            ->first();

        if (! $visita) {
            return response()->json([
                'success' => false,
                'message' => 'No existe la visita',
            ], 404);
        }

        try {
            Visita::where('id_visita', $this->idVisita)
                ->update([
                    'id_dirigido_a'        => request('dirigido_a', null),
                    'id_doc_empresa'       => request('tipo_doc_empresa', null),
                    'documento_empresa'    => request('doc_dirigido_a', null),
                    'objeto_avaluo'        => request('objeto_avaluo', null),
                    'id_pais'              => request('pais', null),
                    'id_departamento'      => request('departamento', null),
                    'id_ciudad'            => request('ciudad', null),
                    'id_comuna'            => request('comuna', null),
                    'sector'               => request('sector', null),
                    'cerca_de'             => request('cerca_de', null),
                    'barrio'               => request('barrio', null),
                    'unidad_edificio'      => request('unidad_edificio', null),
                    'direccion'            => request('direccion', null),
                    'id_tipo_inmueble'     => request('tipo_inmueble', null),
                    'area'                 => request('area', null),
                    'id_estrato'           => request('estrato', null),
                    'numero_inmueble'      => request('numero_inmueble', null),
                    'latitud'              => request('latitud', null),
                    'longitud'             => request('longitud', null),
                    'porcentaje_descuento' => request('porcentaje_descuento', null),
                    'valor_cotizacion'     => request('valor_cotizacion', null),
                    'obser_visita'         => request('obser_visita_tecnica', null),
                    'id_visitado'          => request('visitado', null),
                    'fecha_visita'         => request('fecha_visita', null),
                    'hora_visita'          => request('hora_visita', null),
                    'id_visitador'         => request('visitador', null),
                ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Visita Técnica editada satisfactoriamente',
                'id_visita' => $this->idVisita,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar la visita técnica',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
