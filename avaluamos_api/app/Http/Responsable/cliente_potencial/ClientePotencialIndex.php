<?php

namespace App\Http\Responsable\cliente_potencial;

use App\Models\Cliente;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ClientePotencialIndex implements Responsable
{
    public function toResponse($request)
    {
        try {
            $clientes = Cliente::leftJoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'clientes.id_doc_cliente')
                ->leftJoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                ->leftJoin('pais', 'pais.id_pais', '=', 'clientes.id_pais')
                ->leftJoin('departamento_estado', 'departamento_estado.id_departamento_estado', '=', 'clientes.id_dpto_estado')
                ->leftJoin('ciudad', 'ciudad.id_ciudad', '=', 'clientes.id_ciudad')
                ->leftJoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
                ->leftJoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
                ->leftJoin('usuarios', 'usuarios.id_usuario', '=', 'clientes.usu_logueado')
                ->select(
                    'clientes.id_cliente',
                    'clientes.cli_nombres',
                    'clientes.id_doc_cliente',
                    'tipo_documento.decripcion_documento',
                    'clientes.documento_cliente',
                    'clientes.fecha_nacimiento',
                    'clientes.cli_celular',
                    'clientes.cli_email',
                    'clientes.id_tipo_persona',
                    'tipo_persona.tipo_persona',
                    'pais.id_pais',
                    'pais.descripcion_pais',
                    'departamento_estado.id_departamento_estado',
                    'departamento_estado.descripcion_departamento',
                    'ciudad.id_ciudad',
                    'ciudad.descripcion_ciudad',
                    'referido_por.id_referido_por',
                    'referido_por.referido_por',
                    'redes_sociales.id_red_social',
                    'redes_sociales.red_social',
                    'clientes.nombre_quien_refiere',
                    'clientes.empresa_que_refiere',
                    'usuarios.nombre_usuario'
                )
                ->whereNull('clientes.deleted_at')
                ->orderBy('clientes.id_cliente', 'DESC')
                ->get();

            return response()->json([
                'clientes' => $clientes,
                'message'  => 'Clientes potenciales obtenidos correctamente',
                'success'  => true,
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
