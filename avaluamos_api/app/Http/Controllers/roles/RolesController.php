<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use App\Http\Responsable\roles\RolEdit;
use App\Http\Responsable\roles\RolIndex;
use App\Http\Responsable\roles\RolStore;
use App\Http\Responsable\roles\RolUpdate;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        return new RolIndex();
    }

    public function store(Request $request)
    {
        return new RolStore();
    }

    public function edit($idRol)
    {
        return new RolEdit($idRol);
    }

    public function update(Request $request, $idRol)
    {
        return new RolUpdate($idRol);
    }

    public function consultarRol(Request $request)
    {
        try {
            $rolInput = $request->input('rol');

            $rol = Role::where('name', $rolInput)
                ->where('guard_name', 'web')
                ->first();

            if ($rol) {
                return response()->json(['success' => true, 'data' => $rol]);
            }

            return response()->json(['success' => false, 'message' => 'No existe Rol']);
        } catch (Exception $e) {
            return response()->json(['error_exception' => $e->getMessage()], 500);
        }
    }
}
