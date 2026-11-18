<?php

namespace App\Http\Responsable\usuarios;

use App\Models\Usuario;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Hash;

class UsuarioStore implements Responsable
{
    public function toResponse($request)
    {
        $nombreUsuario   = request('nombre_usuario', null);
        $nombres         = request('nombres', null);
        $apellidos       = request('apellidos', null);
        $idTipoDocumento = request('id_tipo_documento', null);
        $numeroDocumento = request('numero_documento', null);
        $correo          = request('correo', null);
        $celular         = request('celular', null);
        $idCargo         = request('id_cargo', null);
        $idRol           = request('id_rol', null);
        $idEstado        = request('id_estado', 1);
        $clave           = request('clave', null);

        if (empty($nombreUsuario) || empty($numeroDocumento) || empty($nombres) || empty($apellidos)) {
            return response()->json([
                'success' => false,
                'message' => 'Datos incompletos para crear el usuario',
            ], 422);
        }

        try {
            $nuevoUsuario = Usuario::create([
                'nombre_usuario'    => $nombreUsuario,
                'clave'             => Hash::make($clave ?: $numeroDocumento),
                'clave_fallas'      => 0,
                'nombres'           => strtoupper($nombres),
                'apellidos'         => strtoupper($apellidos),
                'id_tipo_documento' => $idTipoDocumento,
                'numero_documento'  => $numeroDocumento,
                'id_estado'         => $idEstado,
                'id_rol'            => $idRol,
                'id_cargo'          => $idCargo,
                'correo'            => $correo,
                'celular'           => $celular,
            ]);

            return response()->json([
                'success'        => true,
                'message'        => 'Usuario creado correctamente',
                'nombre_usuario' => $nuevoUsuario->nombre_usuario,
                'id_usuario'     => $nuevoUsuario->id_usuario,
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creando el usuario',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
