<?php

namespace App\Http\Responsable\asignar_permisos;

use App\Models\Permission;
use App\Models\Role;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AsignarPermisoIndex implements Responsable
{
    public function toResponse($request)
    {
        try {
            $roles = Role::where('guard_name', 'web')
                ->orderBy('name')
                ->get(['id', 'name']);

            $permisos = Permission::where('guard_name', 'web')
                ->orderBy('module')
                ->orderBy('name')
                ->get(['id', 'name', 'route_name', 'module']);

            return response()->json([
                'roles' => $roles,
                'permisos' => $permisos,
            ]);
        } catch (Exception $e) {
            return response()->json(['error_exception' => $e->getMessage()], 500);
        }
    }
}
