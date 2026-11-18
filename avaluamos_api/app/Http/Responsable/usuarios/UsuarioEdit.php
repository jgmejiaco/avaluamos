<?php

namespace App\Http\Responsable\usuarios;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class UsuarioEdit implements Responsable
{
    protected $idUsuario;

    // =========================================

    public function __construct($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    // =========================================

    public function toResponse($request)
    {
        $idUsuario = $this->idUsuario;

        try {
            $usuario = Usuario::leftJoin('rol', 'rol.id_rol', '=', 'usuarios.id_rol')
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
                ->where('usuarios.id_usuario', $idUsuario)
                ->whereNull('usuarios.deleted_at')
                ->first();

            if ($usuario) {
                return response()->json($usuario);
            }

            return response()->json([
                'message' => 'No existe usuario',
            ], 404);
        } catch (Exception $e) {

            return response()->json([
                'message' => 'Error consultando el usuario en BD',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}