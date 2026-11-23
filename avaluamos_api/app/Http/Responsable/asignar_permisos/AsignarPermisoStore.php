<?php

namespace App\Http\Responsable\asignar_permisos;

use App\Models\Permission;
use App\Models\Role;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Spatie\Permission\PermissionRegistrar;

class AsignarPermisoStore implements Responsable
{
    public function toResponse($request)
    {
        $idRol = $request->input('id_rol');
        $permisosIds = $request->input('permisos', $request->input('permissions', []));

        if (! $idRol) {
            return response()->json([
                'success' => false,
                'message' => 'Debe seleccionar un rol.',
            ], 422);
        }

        $rol = Role::where('guard_name', 'web')->find($idRol);

        if (! $rol) {
            return response()->json([
                'success' => false,
                'message' => 'El rol no existe.',
            ], 404);
        }

        if ($rol->name === 'Administrador') {
            return response()->json([
                'success' => false,
                'code' => 'protegido',
                'message' => 'El rol Administrador siempre tiene todos los permisos.',
            ], 422);
        }

        try {
            $permisos = Permission::where('guard_name', 'web')
                ->whereIn('id', (array) $permisosIds)
                ->pluck('name')
                ->all();

            $rol->syncPermissions($permisos);
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            return response()->json([
                'success' => true,
                'message' => 'Permisos asignados correctamente a '.$rol->name.'.',
            ]);
        } catch (Exception $e) {
            return response()->json(['error_exception' => $e->getMessage()], 500);
        }
    }
}
