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
    $router->get('connection_bd_check', 'connection_bd\ConnectionBdCheckController@index');
});

// Con sesión iniciada.
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->get('config_inicial_trait', 'traits\TraitsController@getConfigInicial');

    // USUARIOS
    $router->get('usuarios_index', 'usuarios\UsuariosController@index');
    $router->post('verificar_documento_store', 'usuarios\UsuariosController@verificarDocumentoStore');
    $router->post('verificar_correo_store', 'usuarios\UsuariosController@verificarCorreoStore');
    $router->post('consultar_alias_usuario_store', 'usuarios\UsuariosController@consultarAliasUsuarioStore');
    $router->post('usuarios_store', 'usuarios\UsuariosController@store');
    $router->get('usuario_edit/{idUsuario}', 'usuarios\UsuariosController@edit');
    $router->put('usuario_update/{idUsuario}', 'usuarios\UsuariosController@update');

    // DIRIGIDO A EMPRESAS
    $router->get('dirigido_empresa_index', 'dirigido_empresa\DirigidoEmpresasController@index');
    $router->post('dirigido_empresa_store', 'dirigido_empresa\DirigidoEmpresasController@store');
    $router->get('dirigido_empresa_edit/{idDirigidoA}', 'dirigido_empresa\DirigidoEmpresasController@edit');
    $router->put('dirigido_empresa_update/{idDirigidoA}', 'dirigido_empresa\DirigidoEmpresasController@update');
});
