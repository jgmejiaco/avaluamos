<?php

namespace App\Http\Responsable\roles;

use App\Models\Role;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Spatie\Permission\PermissionRegistrar;

class RolUpdate implements Responsable
{
    protected $idRol;

    public function __construct($idRol)
    {
        $this->idRol = $idRol;
    }

    public function toResponse($request)
    {
        $rol = Role::where('guard_name', 'web')->find($this->idRol);

        if (! $rol) {
            return response()->json([
                'success' => false,
                'message' => 'Rol no encontrado',
            ], 404);
        }

        if ($rol->name === 'Administrador') {
            return response()->json([
                'success' => false,
                'code' => 'protegido',
                'message' => 'El rol Administrador no se puede renombrar.',
            ], 422);
        }

        $nombre = trim((string) $request->input('name', $request->input('rol')));

        if ($nombre === '') {
            return response()->json([
                'success' => false,
                'message' => 'El nombre del rol es obligatorio.',
            ], 422);
        }

        $nombre = mb_convert_case($nombre, MB_CASE_TITLE, 'UTF-8');

        $existe = Role::where('name', $nombre)
            ->where('guard_name', 'web')
            ->where('id', '!=', $rol->id)
            ->exists();

        if ($existe) {
            return response()->json([
                'success' => false,
                'code' => 'existe',
                'message' => 'Este rol ya existe.',
            ], 422);
        }

        try {
            $rol->name = $nombre;
            $rol->save();

            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            return response()->json([
                'success' => true,
                'data' => $rol,
            ]);
        } catch (Exception $e) {
            return response()->json(['error_exception' => $e->getMessage()], 500);
        }
    }
}
