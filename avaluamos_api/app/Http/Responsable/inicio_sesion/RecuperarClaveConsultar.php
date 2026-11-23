<?php

namespace App\Http\Responsable\inicio_sesion;

use App\Models\Usuario;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class RecuperarClaveConsultar implements Responsable
{
    public function toResponse($request)
    {
        $usuario = $request->input('usuario');
        $cedula  = $request->input('cedula');
        $correo  = $request->input('correo');

        if (empty($usuario) || empty($cedula) || empty($correo)) {
            return response()->json([
                'success' => false,
                'code'    => 'campos_requeridos',
                'message' => 'Todos los campos son obligatorios',
            ], 422);
        }

        try {
            $consultaUsuario = Usuario::select('nombre_usuario', 'numero_documento', 'correo')
                ->where('nombre_usuario', $usuario)
                ->where('numero_documento', $cedula)
                ->where('correo', $correo)
                ->whereNull('deleted_at')
                ->first();

            if ($consultaUsuario) {
                return response()->json([
                    'success' => true,
                    'data'    => $consultaUsuario,
                ]);
            }

            return response()->json([
                'success' => false,
                'code'    => 'no_existe',
                'message' => 'NO se encontraron registros con los datos proporcionados',
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code'    => 'exception_user',
                'message' => 'Error consultando el usuario',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
