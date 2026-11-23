<?php

namespace App\Support;

class Permisos
{
    public function tienePermisoRuta(?string $routeName): bool
    {
        if (! $routeName || ! session('sesion_iniciada') || ! session('api_jwt_token')) {
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
