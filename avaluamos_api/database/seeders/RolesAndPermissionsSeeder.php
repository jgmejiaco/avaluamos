<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $guard = 'web';

        $permisosPorModulo = [
            'home' => [
                'home.index' => 'Inicio',
            ],
            'usuarios' => [
                'usuarios.index' => 'Listar usuarios',
                'usuarios.create' => 'Crear usuario (form)',
                'usuarios.store' => 'Guardar usuario',
                'usuarios.show' => 'Ver usuario',
                'usuarios.edit' => 'Editar usuario (form)',
                'usuarios.update' => 'Actualizar usuario',
                'usuarios.destroy' => 'Eliminar usuario',
                'verificar_documento_store' => 'Verificar documento usuario',
                'verificar_correo_store' => 'Verificar correo usuario',
            ],
            'roles' => [
                'roles.index' => 'Listar roles',
                'roles.store' => 'Crear rol',
                'roles.edit' => 'Editar rol (form)',
                'roles.update' => 'Actualizar rol',
                'permisos.index' => 'Redirección legacy a roles',
            ],
            'asignar_permisos' => [
                'asignar_permisos.index' => 'Ver asignación de permisos',
                'asignar_permisos.store' => 'Guardar asignación de permisos',
                'consultar_permisos_rol' => 'Consultar permisos de un rol',
            ],
            'cliente_potencial' => [
                'cliente_potencial.index' => 'Listar clientes',
                'cliente_potencial.create' => 'Crear cliente (form)',
                'cliente_potencial.store' => 'Guardar cliente',
                'cliente_potencial.show' => 'Ver cliente',
                'cliente_potencial.edit' => 'Editar cliente (form)',
                'cliente_potencial.update' => 'Actualizar cliente',
                'cliente_potencial.destroy' => 'Eliminar cliente',
                'verificar_celular' => 'Verificar celular cliente',
                'consultar_ciudad_dpto' => 'Consultar ciudad/dpto cliente',
            ],
            'dirigido_empresa' => [
                'dirigido_empresa.index' => 'Listar empresas',
                'dirigido_empresa.create' => 'Crear empresa (form)',
                'dirigido_empresa.store' => 'Guardar empresa',
                'dirigido_empresa.show' => 'Ver empresa',
                'dirigido_empresa.edit' => 'Editar empresa (form)',
                'dirigido_empresa.update' => 'Actualizar empresa',
                'dirigido_empresa.destroy' => 'Eliminar empresa',
                'validar_empresa' => 'Validar empresa',
            ],
            'visita' => [
                'visita.index' => 'Listar visitas',
                'visita.create' => 'Crear visita (form)',
                'visita.store' => 'Guardar visita',
                'visita.show' => 'Ver visita',
                'visita.edit' => 'Editar visita (form)',
                'visita.update' => 'Actualizar visita',
                'visita.destroy' => 'Eliminar visita',
                'consultar_empresa' => 'Consultar empresa (visita)',
                'visita_cliente_update' => 'Actualizar cliente visita',
                'visita_tecnica_update' => 'Actualizar visita técnica',
                'visita_info_juridica_update' => 'Actualizar info jurídica visita',
                'visita_info_inmueble_update' => 'Actualizar info inmueble visita',
                'visita_caracteristicas_inmueble_update' => 'Actualizar características visita',
                'visita_acabados_inmueble_update' => 'Actualizar acabados visita',
                'visita_calificacion_inmueble_update' => 'Actualizar calificación visita',
                'visita_dotacion_comunal_update' => 'Actualizar dotación comunal visita',
                'visita_info_sector_update' => 'Actualizar info sector visita',
                'visita_condi_urbanisticas_update' => 'Actualizar condiciones urbanísticas visita',
                'visita_obser_generales_update' => 'Actualizar observaciones visita',
                'visita_reg_fotografico_update' => 'Actualizar registro fotográfico visita',
                'visita_valor_estimado_update' => 'Actualizar valor estimado visita',
                'visita_estado_conservacion_update' => 'Actualizar estado conservación visita',
                'consultar_factor_pendiente' => 'Consultar factor pendiente',
                'consultar_factor_ubicacion' => 'Consultar factor ubicación',
                'visita_direccion' => 'Consultar dirección visita',
            ],
            'calendario' => [
                'calendario.index' => 'Ver calendario',
                'calendario.create' => 'Crear calendario (form)',
                'calendario.store' => 'Crear visita calendario',
                'calendario.show' => 'Ver evento calendario',
                'calendario.edit' => 'Editar calendario (form)',
                'calendario.update' => 'Actualizar visita calendario',
                'calendario.destroy' => 'Eliminar visita calendario',
                'consultar_visitas_calendario' => 'Consultar visitas calendario',
                'consultar_visita_calendario' => 'Consultar visita calendario individual',
            ],
            'avaluos' => [
                'avaluos.index' => 'Listar avalúos',
                'avaluos.create' => 'Crear avalúo (form)',
                'avaluos.store' => 'Guardar avalúo',
                'avaluos.show' => 'Ver avalúo',
                'avaluos.edit' => 'Editar avalúo (form)',
                'avaluos.update' => 'Actualizar avalúo',
                'avaluos.destroy' => 'Eliminar avalúo',
                'calcular_avaluo' => 'Calcular / editar avalúo',
                'avaluo_cliente_update' => 'Actualizar cliente avalúo',
                'avaluo_visita_tecnica_update' => 'Actualizar visita técnica avalúo',
                'avaluo_info_inmueble_update' => 'Actualizar info inmueble avalúo',
                'avaluo_info_juridica_update' => 'Actualizar info jurídica avalúo',
                'avaluo_caracteristicas_inmueble_update' => 'Actualizar características avalúo',
                'avaluo_acabados_inmueble_update' => 'Actualizar acabados avalúo',
                'avaluo_calificacion_inmueble_update' => 'Actualizar calificación avalúo',
                'avaluo_dotacion_comunal_update' => 'Actualizar dotación comunal avalúo',
                'avaluo_info_sector_update' => 'Actualizar info sector avalúo',
                'avaluo_condi_urbanisticas_update' => 'Actualizar condiciones urbanísticas avalúo',
                'avaluo_obser_generales_update' => 'Actualizar observaciones avalúo',
                'avaluo_reg_fotografico_update' => 'Actualizar registro fotográfico avalúo',
                'avaluo_valor_estimado_update' => 'Actualizar valor estimado avalúo',
                'avaluo_estado_conservacion_update' => 'Actualizar estado conservación avalúo',
            ],
        ];

        $todosLosPermisos = [];

        foreach ($permisosPorModulo as $modulo => $rutas) {
            foreach ($rutas as $routeName => $etiqueta) {
                $permiso = Permission::firstOrCreate(
                    ['name' => $routeName, 'guard_name' => $guard],
                    [
                        'route_name' => $routeName,
                        'module' => $modulo,
                    ]
                );

                // Mantener metadatos actualizados si ya existía
                $permiso->fill([
                    'route_name' => $routeName,
                    'module' => $modulo,
                ])->save();

                $todosLosPermisos[] = $routeName;
            }
        }

        $admin = Role::firstOrCreate(['name' => 'Administrador', 'guard_name' => $guard]);
        $avaluador = Role::firstOrCreate(['name' => 'Avaluador', 'guard_name' => $guard]);
        $visitador = Role::firstOrCreate(['name' => 'Visitador', 'guard_name' => $guard]);
        $empleado = Role::firstOrCreate(['name' => 'Empleado', 'guard_name' => $guard]);

        // Administrador: todos los permisos
        $admin->syncPermissions($todosLosPermisos);

        // Equivalente aproximado a los mod_* actuales de la UI casera
        $permisosAvaluador = $this->permisosDeModulos($permisosPorModulo, [
            'home', 'calendario', 'visita', 'avaluos',
        ]);
        $permisosVisitador = $this->permisosDeModulos($permisosPorModulo, [
            'home', 'calendario', 'visita',
        ]);
        $permisosEmpleado = $this->permisosDeModulos($permisosPorModulo, [
            'home', 'calendario',
        ]);

        // roles + asignar_permisos: solo Administrador (ya tiene todos)

        $avaluador->syncPermissions($permisosAvaluador);
        $visitador->syncPermissions($permisosVisitador);
        $empleado->syncPermissions($permisosEmpleado);

        // id_rol = roles.id (Spatie). Sincronizar model_has_roles.
        Usuario::query()
            ->whereNull('deleted_at')
            ->orderBy('id_usuario')
            ->chunkById(100, function ($usuarios) {
                foreach ($usuarios as $usuario) {
                    $rol = Role::where('guard_name', 'web')->find($usuario->id_rol);

                    if (! $rol) {
                        continue;
                    }

                    $usuario->syncRoles([$rol->name]);
                }
            }, 'id_usuario');

        $this->command?->info('Roles y permisos Spatie sembrados. Usuarios sincronizados con roles.id.');
    }

    private function permisosDeModulos(array $permisosPorModulo, array $modulos): array
    {
        $nombres = [];

        foreach ($modulos as $modulo) {
            foreach (array_keys($permisosPorModulo[$modulo] ?? []) as $routeName) {
                $nombres[] = $routeName;
            }
        }

        return $nombres;
    }
}
