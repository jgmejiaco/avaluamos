<?php

namespace App\Http\Responsable\usuarios;

use App\Models\Role;
use App\Models\Usuario;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Hash;

class UsuarioStore implements Responsable
{
    public function toResponse($request)
    {
        $nombreUsuario   = $request->input('nombre_usuario');
        $nombres         = $request->input('nombres');
        $apellidos       = $request->input('apellidos');
        $numeroDocumento = $request->input('numero_documento');
        $clave           = $request->input('clave');
        $idRol           = (int) $request->input('id_rol');

        if (empty($nombreUsuario) || empty($numeroDocumento) || empty($nombres) || empty($apellidos)) {
            return response()->json([
                'success' => false,
                'message' => 'Datos incompletos para crear el usuario',
            ], 422);
        }

        $rol = Role::where('guard_name', 'web')->find($idRol);

        if (! $rol) {
            return response()->json([
                'success' => false,
                'message' => 'El rol seleccionado no existe',
            ], 422);
        }

        try {
            $usuario = new Usuario();
            $usuario->nombre_usuario    = $nombreUsuario;
            $usuario->clave             = Hash::make($clave ?: $numeroDocumento);
            $usuario->clave_fallas      = 0;
            $usuario->nombres           = $this->formatoNombrePropio($nombres);
            $usuario->apellidos         = $this->formatoNombrePropio($apellidos);
            $usuario->id_tipo_documento = $request->input('id_tipo_documento');
            $usuario->numero_documento  = $numeroDocumento;
            $usuario->id_estado         = $request->input('id_estado', 1);
            $usuario->id_rol            = $rol->id;
            $usuario->id_cargo          = $request->input('id_cargo');
            $usuario->correo            = $request->input('correo');
            $usuario->celular           = $request->input('celular');
            $usuario->save();

            $usuario->syncRoles([$rol->name]);

            return response()->json([
                'success'        => true,
                'message'        => 'Usuario creado correctamente',
                'nombre_usuario' => $usuario->nombre_usuario,
                'id_usuario'     => $usuario->id_usuario,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creando el usuario',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    private function formatoNombrePropio(?string $texto): ?string
    {
        if ($texto === null || trim($texto) === '') {
            return $texto;
        }

        return mb_convert_case(trim($texto), MB_CASE_TITLE, 'UTF-8');
    }
}
