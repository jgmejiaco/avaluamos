<?php

namespace App\Http\Responsable\avaluos;

use App\Models\Visita;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class AvaluoIndex implements Responsable
{
    public function toResponse($request)
    {
        try {
            $avaluos = Visita::leftJoin('clientes', 'clientes.id_cliente', '=', 'visitas.id_cliente')
                ->leftJoin('dirigido_a', 'dirigido_a.id_dirigido_a', '=', 'visitas.id_dirigido_a')
                ->leftJoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'visitas.id_doc_empresa')
                ->leftJoin('pais', 'pais.id_pais', '=', 'visitas.id_pais')
                ->leftJoin('departamento_estado', 'departamento_estado.id_departamento_estado', '=', 'visitas.id_departamento')
                ->leftJoin('ciudad', 'ciudad.id_ciudad', '=', 'visitas.id_ciudad')
                ->leftJoin('tipo_inmueble', 'tipo_inmueble.id_tipo_inmueble', '=', 'visitas.id_tipo_inmueble')
                ->leftJoin('indicador_numerico as estrato', 'estrato.id_indicador_numerico', '=', 'visitas.id_estrato')
                ->leftJoin('si_no', 'si_no.id_si_no', '=', 'visitas.id_visitado')
                ->leftJoin('usuarios', 'usuarios.id_usuario', '=', 'visitas.id_visitador')
                ->select(
                    'visitas.id_cliente',
                    'visitas.id_visita',
                    'clientes.cli_nombres',
                    'dirigido_a.dirigido_a',
                    'visitas.objeto_avaluo',
                    'ciudad.descripcion_ciudad',
                    'visitas.direccion',
                    'tipo_inmueble.tipo_inmueble',
                    'visitas.area',
                    'estrato.indicador_numerico as estrato',
                    'visitas.porcentaje_descuento',
                    'visitas.valor_cotizacion',
                    'si_no.descripcion_si_no',
                    DB::raw('DATE_FORMAT(FROM_UNIXTIME(visitas.fecha_visita), "%d-%m-%Y") as fecha_visita'),
                    DB::raw('DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(visitas.fecha_visita), INTERVAL 3 DAY), "%d-%m-%Y") as fecha_informe')
                )
                ->whereNull('visitas.deleted_at')
                ->whereNull('clientes.deleted_at')
                ->where('visitas.id_visitado', 1)
                ->orderBy('visitas.id_visita', 'DESC')
                ->get();

            return response()->json([
                'avaluos' => $avaluos,
                'message' => 'Avaluos obtenidos correctamente',
                'success' => true,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error en la consulta de la base de datos',
                'success' => false,
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
