<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('usuarios') || ! Schema::hasTable('roles')) {
            return;
        }

        // Remapear usuarios.id_rol: legado rol.nombre_rol → Spatie roles.id (por nombre).
        if (Schema::hasTable('rol')) {
            DB::statement("
                UPDATE usuarios u
                INNER JOIN rol r ON r.id_rol = u.id_rol
                INNER JOIN roles s ON s.name = r.nombre_rol AND s.guard_name = 'web'
                SET u.id_rol = s.id
            ");
        }

        // Asegurar sync model_has_roles para usuarios con id_rol Spatie.
        $usuarios = DB::table('usuarios')
            ->whereNotNull('id_rol')
            ->whereNull('deleted_at')
            ->get(['id_usuario', 'id_rol']);

        foreach ($usuarios as $usuario) {
            $existe = DB::table('model_has_roles')
                ->where('model_type', 'App\\Models\\Usuario')
                ->where('model_id', $usuario->id_usuario)
                ->where('role_id', $usuario->id_rol)
                ->exists();

            if (! $existe) {
                DB::table('model_has_roles')->where('model_type', 'App\\Models\\Usuario')
                    ->where('model_id', $usuario->id_usuario)
                    ->delete();

                DB::table('model_has_roles')->insert([
                    'role_id' => $usuario->id_rol,
                    'model_type' => 'App\\Models\\Usuario',
                    'model_id' => $usuario->id_usuario,
                ]);
            }
        }

        // Quitar FK a tabla legacy `rol`.
        try {
            Schema::table('usuarios', function (Blueprint $table) {
                $table->dropForeign('usuarios_id_rol_foreign');
            });
        } catch (\Throwable $e) {
            try {
                Schema::table('usuarios', function (Blueprint $table) {
                    $table->dropForeign(['id_rol']);
                });
            } catch (\Throwable $e2) {
                //
            }
        }

        // Spatie roles.id es bigint.
        DB::statement('ALTER TABLE usuarios MODIFY id_rol BIGINT UNSIGNED NULL');

        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('id_rol')
                ->references('id')
                ->on('roles')
                ->nullOnDelete();
        });

        Schema::dropIfExists('rol');
    }

    public function down(): void
    {
        // No se recrea la tabla legacy rol.
        if (Schema::hasTable('usuarios')) {
            Schema::table('usuarios', function (Blueprint $table) {
                try {
                    $table->dropForeign(['id_rol']);
                } catch (\Throwable $e) {
                    //
                }
            });
        }
    }
};
