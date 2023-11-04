<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Rol;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.topbar', function ($view) {
            try {
                $usuLogueado = session('id_usuario');

                $usuRolPermiso = DB::table('rol')
                                    ->leftJoin('usuarios', 'usuarios.id_rol', '=', 'rol.id_rol')
                                    ->select(
                                        'id_usuario',
                                        'rol.id_rol',
                                        'mod_usuario',
                                        'mod_clientes',
                                        'mod_calendario',
                                        'mod_visitas',
                                        'mod_avaluo',
                                        'mod_informes'
                                    )
                                    ->where('id_usuario', $usuLogueado)
                                    ->first();

                $view->with('permiso', $usuRolPermiso);

            } catch (Exception $e) {
                alert()->error('Error', 'An error has occurred, try again, if the problem persists contact support.');
                return back();
            }
        });
    }
}
