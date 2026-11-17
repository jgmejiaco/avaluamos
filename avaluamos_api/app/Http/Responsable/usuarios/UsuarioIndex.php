<?php

namespace App\Http\Responsable\usuarios;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;


class UsuarioIndex implements Responsable
{
    public function toResponse($request)
    {
        try {
            $usuarios = Usuario::leftJoin('rol', 'rol.id_rol', '=', 'usuarios.id_rol')
                ->leftJoin('estado', 'estado.id_estado', '=', 'usuarios.id_estado')
                ->leftJoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'usuarios.id_tipo_documento')
                ->leftJoin('cargo', 'cargo.id_cargo', '=', 'usuarios.id_cargo')
                ->select(
                    'usuarios.id_usuario',
                    'usuarios.nombre_usuario',
                    'usuarios.nombres',
                    'usuarios.apellidos',
                    DB::raw("CONCAT(usuarios.nombres, ' ', usuarios.apellidos) AS nombre_completo"),
                    'usuarios.id_tipo_documento',
                    'tipo_documento.decripcion_documento',
                    'usuarios.numero_documento',
                    'usuarios.correo',
                    'usuarios.celular',
                    'usuarios.id_rol',
                    'rol.nombre_rol',
                    'usuarios.id_estado',
                    'estado.descripcion_estado',
                    'usuarios.id_cargo',
                    'cargo.descripcion_cargo'
                )
                ->whereNull('usuarios.deleted_at')
                ->orderBy('usuarios.id_usuario', 'asc')
                ->get();

            return response()->json([
                'message' => 'Usuarios obtenidos correctamente',
                'usuarios' => $usuarios,
            ], 200);
            
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error en la consulta de la base de datos',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
