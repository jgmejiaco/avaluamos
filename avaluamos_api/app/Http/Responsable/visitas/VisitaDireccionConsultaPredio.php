<?php

namespace App\Http\Responsable\visitas;

use App\Models\Visita;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaDireccionConsultaPredio implements Responsable
{
    public function toResponse($request)
    {
        try {
            $idCliente = request('id_cliente', null);
            $direccionCreate = strtoupper((string) request('direccion_create', ''));

            $visitaDireccionConsultaPredio = Visita::leftJoin('clientes', 'clientes.id_cliente', '=', 'visitas.id_cliente')
                ->leftJoin('dirigido_a', 'dirigido_a.id_dirigido_a', '=', 'visitas.id_dirigido_a')
                ->leftJoin('tipo_documento as id_tdoc_empresa', 'id_tdoc_empresa.id_tipo_documento', '=', 'visitas.id_doc_empresa')
                ->leftJoin('pais as visita_pais', 'visita_pais.id_pais', '=', 'visitas.id_pais')
                ->leftJoin('departamento_estado as visita_dpto', 'visita_dpto.id_departamento_estado', '=', 'visitas.id_departamento')
                ->leftJoin('ciudad as visita_ciudad', 'visita_ciudad.id_ciudad', '=', 'visitas.id_ciudad')
                ->leftJoin('comunas', 'comunas.id_comuna', '=', 'visitas.id_comuna')
                ->leftJoin('tipo_inmueble', 'tipo_inmueble.id_tipo_inmueble', '=', 'visitas.id_tipo_inmueble')
                ->leftJoin('indicador_numerico as estrato', 'estrato.id_indicador_numerico', '=', 'visitas.id_estrato')
                ->select(
                    'visitas.id_visita',
                    'visitas.id_cliente',
                    'dirigido_a.id_dirigido_a',
                    'dirigido_a.dirigido_a',
                    'visitas.id_doc_empresa',
                    'id_tdoc_empresa.decripcion_documento as empresa_tipo_doc',
                    'visitas.documento_empresa',
                    'visitas.objeto_avaluo',
                    'visita_pais.id_pais as visita_pais',
                    'visita_pais.descripcion_pais',
                    'visita_dpto.id_departamento_estado as id_vis_dpto',
                    'visita_dpto.descripcion_departamento as vis_dpto',
                    'visita_ciudad.id_ciudad as id_vis_ciudad',
                    'visita_ciudad.descripcion_ciudad as vis_ciudad',
                    'visitas.id_comuna',
                    'comunas.comuna',
                    'visitas.sector',
                    'visitas.cerca_de',
                    'visitas.barrio',
                    'visitas.unidad_edificio',
                    'tipo_inmueble.id_tipo_inmueble',
                    'tipo_inmueble.tipo_inmueble',
                    'visitas.area',
                    'estrato.id_indicador_numerico as id_estrato',
                    'estrato.indicador_numerico as estrato',
                    'visitas.numero_inmueble',
                    'visitas.porcentaje_descuento',
                    'visitas.latitud',
                    'visitas.longitud',
                    'visitas.obser_visita'
                )
                ->where('visitas.id_cliente', $idCliente)
                ->where('visitas.direccion', $direccionCreate)
                ->whereNull('visitas.deleted_at')
                ->whereNull('clientes.deleted_at')
                ->first();

            return response()->json([
                'visitaDireccionConsultaPredio' => $visitaDireccionConsultaPredio,
                'message'                        => 'Predio obtenido correctamente',
                'success'                        => true,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando el predio por dirección',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
