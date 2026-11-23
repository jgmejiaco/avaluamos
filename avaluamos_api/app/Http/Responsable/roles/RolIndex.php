<?php

namespace App\Http\Responsable\roles;

use App\Models\Role;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class RolIndex implements Responsable
{
    public function toResponse($request)
    {
        try {
            $roles = Role::query()
                ->where('guard_name', 'web')
                ->orderBy('name')
                ->get(['id', 'name', 'guard_name']);

            return response()->json($roles);
        } catch (Exception $e) {
            return response()->json(['error_exception' => $e->getMessage()], 500);
        }
    }
}
