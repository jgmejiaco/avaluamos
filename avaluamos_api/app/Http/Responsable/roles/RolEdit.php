<?php

namespace App\Http\Responsable\roles;

use App\Models\Role;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class RolEdit implements Responsable
{
    protected $idRol;

    public function __construct($idRol)
    {
        $this->idRol = $idRol;
    }

    public function toResponse($request)
    {
        try {
            $rol = Role::where('guard_name', 'web')->find($this->idRol);

            if (! $rol) {
                return response()->json([
                    'success' => false,
                    'message' => 'Rol no encontrado',
                ], 404);
            }

            return response()->json($rol);
        } catch (Exception $e) {
            return response()->json(['error_exception' => $e->getMessage()], 500);
        }
    }
}
