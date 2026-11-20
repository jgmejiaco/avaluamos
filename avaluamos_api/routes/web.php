<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// ======================================================================
// ======================================================================

// Sin sesión: solo el inicio de sesión entrega el JWT.
$router->group(['prefix' => 'api/auth'], function () use ($router) {
    $router->post('login', 'AuthController@login');

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->post('me', 'AuthController@me');
        $router->post('refresh', 'AuthController@refresh');
        $router->post('logout', 'AuthController@logout');
    });
});

// ======================================================================
// ======================================================================

// Sin sesión de usuario, o con JWT. La app entra con X-App-Api-Key.
$router->group(['prefix' => 'api', 'middleware' => 'auth_or_app_key'], function () use ($router) {
    $router->get('connection_bd_check', 'connection_bd\ConnectionBdCheckController@index');
});

// ======================================================================
// ======================================================================


// Con sesión iniciada.
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->get('config_inicial_trait', 'traits\TraitsController@getConfigInicial');

    // ======================================================================

    // USUARIOS
    $router->get('usuarios_index', 'usuarios\UsuariosController@index');
    $router->post('verificar_documento_store', 'usuarios\UsuariosController@verificarDocumentoStore');
    $router->post('verificar_correo_store', 'usuarios\UsuariosController@verificarCorreoStore');
    $router->post('consultar_alias_usuario_store', 'usuarios\UsuariosController@consultarAliasUsuarioStore');
    $router->post('usuarios_store', 'usuarios\UsuariosController@store');
    $router->get('usuario_edit/{idUsuario}', 'usuarios\UsuariosController@edit');
    $router->put('usuario_update/{idUsuario}', 'usuarios\UsuariosController@update');

    // ======================================================================

    // DIRIGIDO A EMPRESAS
    $router->get('dirigido_empresa_index', 'dirigido_empresa\DirigidoEmpresasController@index');
    $router->post('dirigido_empresa_store', 'dirigido_empresa\DirigidoEmpresasController@store');
    $router->get('dirigido_empresa_edit/{idDirigidoA}', 'dirigido_empresa\DirigidoEmpresasController@edit');
    $router->put('dirigido_empresa_update/{idDirigidoA}', 'dirigido_empresa\DirigidoEmpresasController@update');

    // ======================================================================

    // CLIENTE POTENCIAL
    $router->get('cliente_potencial_index', 'cliente_potencial\ClientePotencialController@index');
    $router->post('cliente_potencial_store', 'cliente_potencial\ClientePotencialController@store');
    $router->get('cliente_potencial_edit/{idClientePotencial}', 'cliente_potencial\ClientePotencialController@edit');
    $router->put('cliente_potencial_update/{idClientePotencial}', 'cliente_potencial\ClientePotencialController@update');
    $router->post('cliente_potencial_individual/{idClientePotencial}', 'cliente_potencial\ClientePotencialController@individual');
    $router->post('cliente_verificar_celular', 'cliente_potencial\ClientePotencialController@clienteVerificarCelular');
    $router->post('cliente_consultar_ciudad_dpto', 'cliente_potencial\ClientePotencialController@clienteConsultarCiudadDpto');

    // ======================================================================

    // VISITAS
    $router->get('visitas_index', 'visitas\VisitasController@index');
    $router->post('visita_create_cliente/{idCliente}', 'visitas\VisitasController@visitaCreateCliente');
    $router->post('visita_consultar_empresa/{idEmpresa}', 'visitas\VisitasController@visitaConsultarEmpresa');
    $router->post('visitas_store', 'visitas\VisitasController@store');
    $router->post('visita_store_consulta_predio', 'visitas\VisitasController@visitaStoreConsultaPredio');
    $router->get('visitas_edit/{idVisita}', 'visitas\VisitasController@edit');
    $router->put('visitas_update/{idVisita}', 'visitas\VisitasController@update');
    $router->post('visita_direccion_consulta_predio', 'visitas\VisitasController@visitaDireccionConsultaPredio');
    $router->post('visita_consultar_factor_pendiente', 'visitas\VisitasController@visitaConsultarFactorPendiente');
    $router->post('visita_consultar_factor_ubicacion', 'visitas\VisitasController@visitaConsultarFactorUbicacion');

    // VISITA TODOS LOS UPDATE
    $router->put('visita_tecnica_update/{idVisita}', 'visitas\VisitasController@visitaTecnicaUpdate');
    $router->put('visita_info_inmueble_update/{idVisita}', 'visitas\VisitasController@visitaInfoInmuebleUpdate');
    $router->put('visita_caracteristicas_inmueble_update/{idVisita}', 'visitas\VisitasController@visitaCaracteristicasInmuebleUpdate');
    $router->put('visita_acabados_inmueble_update/{idVisita}', 'visitas\VisitasController@visitaAcabadosInmuebleUpdate');
    $router->put('visita_calificacion_inmueble_update/{idVisita}', 'visitas\VisitasController@visitaCalificacionInmuebleUpdate');
    $router->put('visita_dotacion_comunal_update/{idVisita}', 'visitas\VisitasController@visitaDotacionComunalUpdate');
    $router->put('visita_info_sector_update/{idVisita}', 'visitas\VisitasController@visitaInfoSectorUpdate');
    $router->put('visita_condi_urbanisticas_update/{idVisita}', 'visitas\VisitasController@visitaCondiUrbanisticasUpdate');
    $router->put('visita_estado_conservacion_update/{idVisita}', 'visitas\VisitasController@visitaEstadoConservacionUpdate');
    $router->put('visita_obser_generales_update/{idVisita}', 'visitas\VisitasController@visitaObserGeneralesUpdate');
    $router->put('visita_reg_fotografico_update/{idVisita}', 'visitas\VisitasController@visitaRegFotograficoUpdate');
    $router->put('visita_valor_estimado_update/{idVisita}', 'visitas\VisitasController@visitaValorEstimadoUpdate');

    // ======================================================================
});
