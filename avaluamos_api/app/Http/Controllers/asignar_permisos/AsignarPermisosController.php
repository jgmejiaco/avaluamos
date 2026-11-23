<?php

namespace App\Http\Controllers\asignar_permisos;

use App\Http\Controllers\Controller;
use App\Http\Responsable\asignar_permisos\AsignarPermisoIndex;
use App\Http\Responsable\asignar_permisos\AsignarPermisoStore;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class AsignarPermisosController extends Controller
{
    public function index()
    {
        return new AsignarPermisoIndex();
    }

    public function store(Request $request)
    {
        return new AsignarPermisoStore();
    }

    public function consultarPermisosRol(Request $request)
    {
        try {
            $idRol = $request->input('id_rol');

            if (! $idRol) {
                return response()->json([
                    'success' => false,
                    'message' => 'Rol requerido',
                ], 422);
            }

            $rol = Role::where('guard_name', 'web')->with('permissions')->find($idRol);

            if (! $rol) {
                return response()->json([
                    'success' => false,
                    'message' => 'Rol no encontrado',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'rol' => $rol->name,
                'es_administrador' => $rol->name === 'Administrador',
                'permission_ids' => $rol->permissions->pluck('id')->values(),
            ]);
        } catch (Exception $e) {
            return response()->json(['error_exception' => $e->getMessage()], 500);
        }
    }
}
