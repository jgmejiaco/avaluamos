<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// ======================================================================
// ======================================================================

// Sin sesión: login y recuperación de clave (sin JWT).
$router->group(['prefix' => 'api/auth'], function () use ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('recuperar_clave_consultar', 'inicio_sesion\InicioSesionController@recuperarClaveConsultar');

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
    $router->post('dirigido_empresa_consultar', 'dirigido_empresa\DirigidoEmpresasController@dirigidoEmpresaConsultar');

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
    $router->put('Visita_cliente_update/{idCliente}', 'visitas\VisitasController@visitaClienteUpdate');

    // ======================================================================

    // AVALÚOS
    $router->get('avaluos_index', 'avaluos\AvaluosController@index');
    $router->get('avaluo_edit/{idVisita}', 'avaluos\AvaluosController@edit');
    $router->put('avaluo_update/{idVisita}', 'avaluos\AvaluosController@update');
    $router->post('avaluo_visita_create_cliente/{idVisita}', 'avaluos\AvaluosController@avaluoVisitaCreateCliente');
    $router->post('avaluo_consultar_empresa/{idEmpresa}', 'avaluos\AvaluosController@avaluoConsultarEmpresa');
    $router->post('avaluo_consultar_factor_pendiente', 'avaluos\AvaluosController@avaluoConsultarFactorPendiente');
    $router->post('avaluo_consultar_factor_ubicacion', 'avaluos\AvaluosController@avaluoConsultarFactorUbicacion');

    // AVALÚOS TODOS LOS UPDATE
    $router->put('avaluo_tecnica_update/{idVisita}', 'avaluos\AvaluosController@avaluoTecnicaUpdate');
    $router->put('avaluo_info_inmueble_update/{idVisita}', 'avaluos\AvaluosController@avaluoInfoInmuebleUpdate');
    $router->put('avaluo_caracteristicas_inmueble_update/{idVisita}', 'avaluos\AvaluosController@avaluoCaracteristicasInmuebleUpdate');
    $router->put('avaluo_acabados_inmueble_update/{idVisita}', 'avaluos\AvaluosController@avaluoAcabadosInmuebleUpdate');
    $router->put('avaluo_calificacion_inmueble_update/{idVisita}', 'avaluos\AvaluosController@avaluoCalificacionInmuebleUpdate');
    $router->put('avaluo_dotacion_comunal_update/{idVisita}', 'avaluos\AvaluosController@avaluoDotacionComunalUpdate');
    $router->put('avaluo_info_sector_update/{idVisita}', 'avaluos\AvaluosController@avaluoInfoSectorUpdate');
    $router->put('avaluo_condi_urbanisticas_update/{idVisita}', 'avaluos\AvaluosController@avaluoCondiUrbanisticasUpdate');
    $router->put('avaluo_estado_conservacion_update/{idVisita}', 'avaluos\AvaluosController@avaluoEstadoConservacionUpdate');
    $router->put('avaluo_obser_generales_update/{idVisita}', 'avaluos\AvaluosController@avaluoObserGeneralesUpdate');
    $router->put('avaluo_reg_fotografico_update/{idVisita}', 'avaluos\AvaluosController@avaluoRegFotograficoUpdate');
    $router->put('avaluo_valor_estimado_update/{idVisita}', 'avaluos\AvaluosController@avaluoValorEstimadoUpdate');
    $router->put('avaluo_info_juridica_update/{idVisita}', 'avaluos\AvaluosController@avaluoInfoJuridicaUpdate');

    // CALENDARIO
    // $router->get('calendario_index', 'calendario\CalendarioController@index');
    $router->post('calendario_store', 'calendario\CalendarioController@store');
    $router->get('calendario_consultar_visitas', 'calendario\CalendarioController@calendarioConsultarVisitas');
    $router->get('calendario_consultar_visita_individual/{idVisitaIndividual}', 'calendario\CalendarioController@calendarioConsultarVisitaIndividual');
    // $router->get('calendario_edit/{idCalendario}', 'calendario\CalendarioController@edit');
    $router->put('calendario_update/{idVisitaEditar}', 'calendario\CalendarioController@update');

    // ======================================================================

    // ROLES (Spatie)
    $router->get('rol_index', 'roles\RolesController@index');
    $router->post('rol_store', 'roles\RolesController@store');
    $router->get('rol_edit/{idRol}', 'roles\RolesController@edit');
    $router->put('rol_update/{idRol}', 'roles\RolesController@update');
    $router->post('consultar_rol', 'roles\RolesController@consultarRol');

    // ASIGNAR PERMISOS (Spatie)
    $router->get('asignar_permiso_index', 'asignar_permisos\AsignarPermisosController@index');
    $router->get('consultar_permisos_rol', 'asignar_permisos\AsignarPermisosController@consultarPermisosRol');
    $router->post('asignar_permiso_rol', 'asignar_permisos\AsignarPermisosController@store');
});
