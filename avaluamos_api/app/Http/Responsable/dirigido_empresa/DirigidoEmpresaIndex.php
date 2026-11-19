<?php

namespace App\Http\Responsable\dirigido_empresa;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use App\Models\DirigidoA;


class DirigidoEmpresaIndex implements Responsable
{
    public function toResponse($request)
    {
        try {
            $dirigidoEmpresas = DirigidoA::leftJoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'dirigido_a.id_tipo_documento')
                ->leftJoin('usuarios', 'usuarios.id_usuario', '=', 'dirigido_a.usu_logueado')
                ->select(
                    'dirigido_a.id_dirigido_a',
                    'dirigido_a.dirigido_a',
                    'dirigido_a.id_tipo_documento',
                    'dirigido_a.numero_documento',
                    'tipo_documento.decripcion_documento',
                    'usuarios.nombre_usuario'
                )
                ->whereNull('dirigido_a.deleted_at')
                ->orderBy('dirigido_a.dirigido_a', 'ASC')
                ->get();

            return response()->json([
                'dirigidoEmpresas' => $dirigidoEmpresas,
                'message'          => 'Dirigido a Empresas obtenidos correctamente',
                'success'          => true,
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
