<?php

namespace App\Providers;

use App\Support\ApiClient;
use App\Support\Permisos;
use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ApiClient::class, function () {
            $baseUri = rtrim((string) config('services.api.base_uri'), '/');

            return new ApiClient([
                'base_uri' => $baseUri === '' ? null : $baseUri.'/',
                'timeout' => (float) config('services.api.timeout', 60),
                'connect_timeout' => 5.0,
            ]);
        });

        $this->app->singleton(Permisos::class, function () {
            return new Permisos();
        });
    }

    public function boot()
    {
        View::composer('layouts.topbar', function ($view) {
            try {
                $usuarioLogueado = $this->cargarUsuarioLogueadoMenu(session('id_usuario'));

                $view->with([
                    'permisos' => app(Permisos::class),
                    'usuarioLogueado' => $usuarioLogueado,
                ]);
            } catch (Exception $e) {
                alert()->error('Error', 'An error has occurred, try again, if the problem persists contact support.');

                return back();
            }
        });
    }

    /**
     * Datos de menú usuario: sesión (login API) o fallback GET usuario_edit.
     */
    private function cargarUsuarioLogueadoMenu($idUsuario)
    {
        if (! $idUsuario || ! session('sesion_iniciada')) {
            return null;
        }

        if (session('nombre_rol') !== null && session('nombre_rol') !== '' && session()->has('nombres')) {
            return (object) [
                'nombre_rol' => session('nombre_rol'),
                'nombre_completo' => trim(session('nombres').' '.session('apellidos')),
            ];
        }

        try {
            $response = app(ApiClient::class)->get('usuario_edit/'.$idUsuario);
            $usuario = json_decode($response->getBody()->getContents());

            if (! is_object($usuario) || ! isset($usuario->id_usuario)) {
                return null;
            }

            session()->put('nombres', $usuario->nombres ?? '');
            session()->put('apellidos', $usuario->apellidos ?? '');
            session()->put('nombre_rol', $usuario->nombre_rol ?? '');

            return (object) [
                'nombre_rol' => $usuario->nombre_rol ?? '',
                'nombre_completo' => $usuario->nombre_completo
                    ?? trim(($usuario->nombres ?? '').' '.($usuario->apellidos ?? '')),
            ];
        } catch (Exception $e) {
            return null;
        }
    }
}
