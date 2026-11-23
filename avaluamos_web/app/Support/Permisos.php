<?php

namespace App\Support;

use Illuminate\Support\Facades\Auth;

class Permisos
{
    public function tienePermisoRuta(?string $routeName): bool
    {
        if (! $routeName || ! session('sesion_iniciada') || ! Auth::check()) {
            return false;
        }

        if ($this->esAdministrador()) {
            return true;
        }

        $permisos = session('permisos_rutas', []);

        return in_array($routeName, (array) $permisos, true);
    }

    public function esAdministrador(): bool
    {
        return (bool) session('es_administrador', false);
    }
}
