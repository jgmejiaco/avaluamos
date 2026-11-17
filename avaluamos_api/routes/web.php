<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Sin sesión: solo el inicio de sesión entrega el JWT.
$router->group(['prefix' => 'api/auth'], function () use ($router) {
    $router->post('login', 'AuthController@login');

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->post('me', 'AuthController@me');
        $router->post('refresh', 'AuthController@refresh');
        $router->post('logout', 'AuthController@logout');
    });
});

// Sin sesión de usuario, o con JWT. La app entra con X-App-Api-Key.
$router->group(['prefix' => 'api', 'middleware' => 'auth_or_app_key'], function () use ($router) {
    $router->get('salud', 'salud\SaludController@index');
});

// Con sesión iniciada.
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->get('config_inicial_trait', 'traits\TraitsController@getConfigInicial');

    // USUARIOS
    $router->get('usuarios_index', 'usuarios\UsuariosController@index');
    $router->post('verificar_documento_store', 'usuarios\UsuariosController@verificarDocumentoStore');
    $router->post('consultar_usuario_store', 'usuarios\UsuariosController@consultarUsuarioStore');
    $router->get('usuarios_store', 'usuarios\UsuariosController@store');
});
