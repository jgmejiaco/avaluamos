<?php

namespace App\Http\Responsable\asignar_permisos;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AsignarPermisoIndex implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->get('asignar_permiso_index');
            $data = json_decode($response->getBody()->getContents());

            $roles = collect($data->roles ?? [])->pluck('name', 'id');

            $permisosPorModulo = collect($data->permisos ?? [])
                ->groupBy(function ($permiso) {
                    return $permiso->module ?: 'otros';
                });

            $etiquetasModulo = [
                'home' => 'Inicio',
                'usuarios' => 'Usuarios',
                'roles' => 'Roles',
                'asignar_permisos' => 'Asignar Permisos',
                'permisos' => 'Permisos (legacy)',
                'cliente_potencial' => 'Clientes',
                'dirigido_empresa' => 'Empresas',
                'visita' => 'Visitas',
                'calendario' => 'Calendario',
                'avaluos' => 'Avalúos',
                'otros' => 'Otros',
            ];

            return view('asignar_permisos.index', compact('roles', 'permisosPorModulo', 'etiquetasModulo'));
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            alert()->error('Error', 'No se pudo cargar la asignación de permisos.');
            return redirect()->route('home.index');
        }
    }
}
