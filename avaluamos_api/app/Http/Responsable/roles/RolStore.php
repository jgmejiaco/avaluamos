<?php

namespace App\Http\Responsable\roles;

use App\Models\Role;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Spatie\Permission\PermissionRegistrar;

class RolStore implements Responsable
{
    public function toResponse($request)
    {
        $nombre = trim((string) $request->input('name', $request->input('rol')));

        if ($nombre === '') {
            return response()->json([
                'success' => false,
                'message' => 'El nombre del rol es obligatorio.',
            ], 422);
        }

        $nombre = mb_convert_case($nombre, MB_CASE_TITLE, 'UTF-8');

        if (Role::where('name', $nombre)->where('guard_name', 'web')->exists()) {
            return response()->json([
                'success' => false,
                'code' => 'existe',
                'message' => 'Este rol ya existe.',
            ], 422);
        }

        try {
            $rol = Role::create([
                'name' => $nombre,
                'guard_name' => 'web',
            ]);

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
