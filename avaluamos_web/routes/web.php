<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('connection_bd_check', 'App\Http\Controllers\inicio_sesion\LoginController@connectionBdCheck')->name('connection_bd_check');

Route::middleware('guest')->group(function () {
    Route::get('/', 'App\Http\Controllers\inicio_sesion\LoginController@index')->name('inicio');

    Route::group(['namespace' => 'App\Http\Controllers\inicio_sesion'], function () {
        Route::resource('login', 'LoginController')->only(['index', 'store']);
        Route::get('login_usuario', 'LoginController@index')->name('login_usuario');

        Route::get('recuperar', 'LoginController@resetPassword')->name('recuperar_clave');
        Route::post('validar', 'LoginController@validarDatos')->name('validar_datos');
        Route::get('actualizar/{expiration}', 'LoginController@actualizarContraseña')->name('actualizar_clave');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\inicio_sesion'], function () {
    Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::post('sesion/keepalive', 'App\Http\Controllers\inicio_sesion\LoginController@keepalive')
        ->name('sesion.keepalive');

    Route::group(['namespace' => 'App\Http\Controllers\home'], function () {
        Route::resource('home', 'HomeController')->middleware('permission');
    });

    Route::group(['namespace' => 'App\Http\Controllers\usuarios'], function () {
        Route::resource('usuarios', 'UsuariosController')->middleware('permission');
        Route::post('verificar_documento_store', 'UsuariosController@verificarDocumentoStore')->name('verificar_documento_store')->middleware('permission');
        Route::post('verificar_correo_store', 'UsuariosController@verificarCorreoStore')->name('verificar_correo_store')->middleware('permission');
    });

    Route::group(['namespace' => 'App\Http\Controllers\roles'], function () {
        Route::resource('roles', 'RolesController')->only(['index', 'store', 'edit', 'update'])->middleware('permission');
    });

    Route::group(['namespace' => 'App\Http\Controllers\asignar_permisos'], function () {
        Route::resource('asignar_permisos', 'AsignarPermisosController')->only(['index', 'store'])->middleware('permission');
        Route::get('consultar_permisos_rol', 'AsignarPermisosController@consultarPermisosRol')->name('consultar_permisos_rol')->middleware('permission');
    });

    // Legacy: redirige al nuevo módulo Spatie
    Route::get('permisos', function () {
        return redirect()->route('roles.index');
    })->name('permisos.index')->middleware('permission');

    Route::group(['namespace' => 'App\Http\Controllers\cliente_potencial'], function () {
        Route::resource('cliente_potencial', 'ClientePotencialController')->middleware('permission');
        Route::post('verificar_celular', 'ClientePotencialController@verificarCelular')->name('verificar_celular')->middleware('permission');
        Route::post('consultar_ciudad_dpto', 'ClientePotencialController@consultarCiudadDpto')->name('consultar_ciudad_dpto')->middleware('permission');
    });

    Route::group(['namespace' => 'App\Http\Controllers\dirigido_empresa'], function () {
        Route::resource('dirigido_empresa', 'DirigidoEmpresaController')->middleware('permission');
        Route::post('validar_empresa', 'DirigidoEmpresaController@validarEmpresa')->name('validar_empresa')->middleware('permission');
    });

    Route::group(['namespace' => 'App\Http\Controllers\visita'], function () {
        Route::resource('visita', 'VisitaController')->middleware('permission');
        Route::post('consultar_empresa', 'VisitaController@consultarEmpresa')->name('consultar_empresa')->middleware('permission');
        Route::post('visita_cliente_update', 'VisitaController@visitaClienteUpdate')->name('visita_cliente_update')->middleware('permission');
        Route::post('visita_tecnica_update', 'VisitaController@visitaTecnicaUpdate')->name('visita_tecnica_update')->middleware('permission');
        Route::post('visita_info_juridica_update', 'VisitaController@visitaInfoJuridicaUpdate')->name('visita_info_juridica_update')->middleware('permission');
        Route::post('visita_info_inmueble_update', 'VisitaController@visitaInfoInmuebleUpdate')->name('visita_info_inmueble_update')->middleware('permission');
        Route::post('visita_caracteristicas_inmueble_update', 'VisitaController@visitaCaracteristicasInmuebleUpdate')->name('visita_caracteristicas_inmueble_update')->middleware('permission');
        Route::post('visita_acabados_inmueble_update', 'VisitaController@visitaAcabadosInmuebleUpdate')->name('visita_acabados_inmueble_update')->middleware('permission');
        Route::post('visita_calificacion_inmueble_update', 'VisitaController@visitaCalificacionInmuebleUpdate')->name('visita_calificacion_inmueble_update')->middleware('permission');
        Route::post('visita_dotacion_comunal_update', 'VisitaController@visitaDotacionComunalUpdate')->name('visita_dotacion_comunal_update')->middleware('permission');
        Route::post('visita_info_sector_update', 'VisitaController@visitaInfoSectorUpdate')->name('visita_info_sector_update')->middleware('permission');
        Route::post('visita_condi_urbanisticas_update', 'VisitaController@visitaCondiUrbanisticasUpdate')->name('visita_condi_urbanisticas_update')->middleware('permission');
        Route::post('visita_obser_generales_update', 'VisitaController@visitaObserGeneralesUpdate')->name('visita_obser_generales_update')->middleware('permission');
        Route::post('visita_reg_fotografico_update', 'VisitaController@visitaRegFotograficoUpdate')->name('visita_reg_fotografico_update')->middleware('permission');
        Route::post('visita_valor_estimado_update', 'VisitaController@visitaValorEstimadoUpdate')->name('visita_valor_estimado_update')->middleware('permission');
        Route::post('visita_estado_conservacion_update', 'VisitaController@visitaEstadoConservacionUpdate')->name('visita_estado_conservacion_update')->middleware('permission');
        Route::post('consultar_factor_pendiente', 'VisitaController@consultarFactorPendiente')->name('consultar_factor_pendiente')->middleware('permission');
        Route::post('consultar_factor_ubicacion', 'VisitaController@consultarFactorUbicacion')->name('consultar_factor_ubicacion')->middleware('permission');
        Route::post('visita_direccion', 'VisitaController@visitaDireccion')->name('visita_direccion')->middleware('permission');
    });

    Route::group(['namespace' => 'App\Http\Controllers\calendario'], function () {
        Route::resource('calendario', 'CalendarioController')->middleware('permission');
        Route::post('consultar_visitas_calendario', 'CalendarioController@consultarVisitasCalendario')->name('consultar_visitas_calendario')->middleware('permission');
        Route::post('consultar_visita_calendario', 'CalendarioController@consultarVisitaCalendario')->name('consultar_visita_calendario')->middleware('permission');
    });

    Route::group(['namespace' => 'App\Http\Controllers\avaluo'], function () {
        Route::resource('avaluos', 'AvaluoController')->middleware('permission');
        Route::get('calcular_avaluo/{idVisita}', 'AvaluoController@edit')->name('calcular_avaluo')->middleware('permission');
        Route::post('avaluo_cliente_update', 'AvaluoController@avaluoClienteUpdate')->name('avaluo_cliente_update')->middleware('permission');
        Route::post('avaluo_visita_tecnica_update', 'AvaluoController@avaluoVisitaTecnicaUpdate')->name('avaluo_visita_tecnica_update')->middleware('permission');
        Route::post('avaluo_info_inmueble_update', 'AvaluoController@avaluoInfoInmuebleUpdate')->name('avaluo_info_inmueble_update')->middleware('permission');
        Route::post('avaluo_info_juridica_update', 'AvaluoController@avaluoInfoJuridicaUpdate')->name('avaluo_info_juridica_update')->middleware('permission');
        Route::post('avaluo_caracteristicas_inmueble_update', 'AvaluoController@avaluoCaracteristicasInmuebleUpdate')->name('avaluo_caracteristicas_inmueble_update')->middleware('permission');
        Route::post('avaluo_acabados_inmueble_update', 'AvaluoController@avaluoAcabadosInmuebleUpdate')->name('avaluo_acabados_inmueble_update')->middleware('permission');
        Route::post('avaluo_calificacion_inmueble_update', 'AvaluoController@avaluoCalificacionInmuebleUpdate')->name('avaluo_calificacion_inmueble_update')->middleware('permission');
        Route::post('avaluo_dotacion_comunal_update', 'AvaluoController@avaluoDotacionComunalUpdate')->name('avaluo_dotacion_comunal_update')->middleware('permission');
        Route::post('avaluo_info_sector_update', 'AvaluoController@avaluoInfoSectorUpdate')->name('avaluo_info_sector_update')->middleware('permission');
        Route::post('avaluo_condi_urbanisticas_update', 'AvaluoController@avaluoCondiUrbanisticasUpdate')->name('avaluo_condi_urbanisticas_update')->middleware('permission');
        Route::post('avaluo_obser_generales_update', 'AvaluoController@avaluoObserGeneralesUpdate')->name('avaluo_obser_generales_update')->middleware('permission');
        Route::post('avaluo_reg_fotografico_update', 'AvaluoController@avaluoRegFotograficoUpdate')->name('avaluo_reg_fotografico_update')->middleware('permission');
        Route::post('avaluo_valor_estimado_update', 'AvaluoController@avaluoValorEstimadoUpdate')->name('avaluo_valor_estimado_update')->middleware('permission');
        Route::post('avaluo_estado_conservacion_update', 'AvaluoController@avaluoEstadoConservacionUpdate')->name('avaluo_estado_conservacion_update')->middleware('permission');
        Route::post('consultar_empresa', 'AvaluoController@consultarEmpresa')->name('consultar_empresa')->middleware('permission');
        Route::post('consultar_factor_pendiente', 'AvaluoController@consultarFactorPendiente')->name('consultar_factor_pendiente')->middleware('permission');
        Route::post('consultar_factor_ubicacion', 'AvaluoController@consultarFactorUbicacion')->name('consultar_factor_ubicacion')->middleware('permission');
    });

});

Route::get('storage-link', function () {
    Artisan::call('storage:link');

    if (file_exists(public_path('storage'))) {
        return 'El directorio "public/storage" ya existe';
    }

    app('files')->link(
        storage_path(('app/public')),
        public_path('storage')
    );

    return 'El directorio "public/storage" ha sido vinculado (linked)';
});
