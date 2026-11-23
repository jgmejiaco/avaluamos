<?php

namespace App\Providers;

use App\Support\ApiClient;
use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ApiClient::class, function () {
            $baseUri = rtrim((string) config('services.api.base_uri'), '/');

            return new ApiClient([
                'base_uri'        => $baseUri === '' ? null : $baseUri.'/',
                'timeout'         => (float) config('services.api.timeout', 60),
                'connect_timeout' => 5.0,
            ]);
        });
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
                $datosMenu = $this->cargarDatosMenuTopbar(session('id_usuario'));

                $view->with([
                    'permiso'         => $datosMenu['permiso'],
                    'usuarioLogueado' => $datosMenu['usuarioLogueado'],
                ]);
            } catch (Exception $e) {
                alert()->error('Error', 'An error has occurred, try again, if the problem persists contact support.');
                return back();
            }
        });
    }

    /**
     * Menú topbar: solo sesión (llenada por login API) o fallback GET usuario_edit (API).
     * Sin consultas locales a BD en el web.
     */
    private function cargarDatosMenuTopbar($idUsuario): array
    {
        $vacio = [
            'permiso'         => null,
            'usuarioLogueado' => null,
        ];

        if (! $idUsuario || ! session('sesion_iniciada')) {
            return $vacio;
        }

        $permisoSesion = session('permiso');
        $tieneMenuSesion = session('nombre_rol') !== null
            && session('nombre_rol') !== ''
            && session()->has('nombres')
            && is_array($permisoSesion);

        if ($tieneMenuSesion) {
            return [
                'permiso' => (object) $permisoSesion,
                'usuarioLogueado' => (object) [
                    'nombre_rol'      => session('nombre_rol'),
                    'nombre_completo' => trim(session('nombres').' '.session('apellidos')),
                ],
            ];
        }

        try {
            $response = app(ApiClient::class)->get('usuario_edit/'.$idUsuario);
            $usuario = json_decode($response->getBody()->getContents());

            if (! is_object($usuario) || ! isset($usuario->id_usuario)) {
                return $vacio;
            }

            $permiso = [
                'id_usuario'     => $usuario->id_usuario,
                'id_rol'         => $usuario->id_rol ?? null,
                'mod_usuario'    => $usuario->mod_usuario ?? null,
                'mod_clientes'   => $usuario->mod_clientes ?? null,
                'mod_calendario' => $usuario->mod_calendario ?? null,
                'mod_visitas'    => $usuario->mod_visitas ?? null,
                'mod_avaluo'     => $usuario->mod_avaluo ?? null,
                'mod_informes'   => $usuario->mod_informes ?? null,
            ];

            session()->put('nombres', $usuario->nombres ?? '');
            session()->put('apellidos', $usuario->apellidos ?? '');
            session()->put('nombre_rol', $usuario->nombre_rol ?? '');
            session()->put('permiso', $permiso);

            return [
                'permiso' => (object) $permiso,
                'usuarioLogueado' => (object) [
                    'nombre_rol'      => $usuario->nombre_rol ?? '',
                    'nombre_completo' => $usuario->nombre_completo
                        ?? trim(($usuario->nombres ?? '').' '.($usuario->apellidos ?? '')),
                ],
            ];
        } catch (Exception $e) {
            return $vacio;
        }
    }
}
