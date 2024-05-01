<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware(['middleware_avaluamos'])->group(function () {
// Route::middleware(['auth'])->group(function () {
// Route::group(['auth'], function () {
// Route::group(['middleware' => ['auth', 'password_expired']], function () {

Route::get('/', function () {
    return view('inicio_sesion.login');
})->name('inicio');

// RUTA COMPROBAR CONEXIÓN BASE DE DATOS
Route::get('check_db_conexion', 'inicio_sesion\LoginController@checkDatabaseConnection')->name('check_db_conexion');

// Rutas del Login
Route::group(['namespace' => 'App\Http\Controllers\inicio_sesion'], function () {
    Route::resource('login', 'LoginController');
    Route::get('login_usuario', 'LoginController@index')->name('login_usuario');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Rutas recuperacion clave
    Route::get('recuperar', 'LoginController@resetPassword')->name('recuperar_clave');
    Route::post('validar', 'LoginController@validarDatos')->name('validar_datos');
    Route::get('actualizar/{expiration}', 'LoginController@actualizarContraseña')->name('actualizar_clave');
});

// ========================================================================

// RUTA AL INICIAR SESIÓN (HOME)
Route::group(['namespace' => 'App\Http\Controllers\home'], function () {
    Route::resource('home', 'HomeController');
});

// ========================================================================

// RUTAS DEL ADMINISTRADOR
Route::group(['namespace' => 'App\Http\Controllers\admin'], function () {
    Route::resource('administrador', 'AdministradorController');
    Route::post('editar_usuario', 'AdministradorController@update')->name('editar_usuario');
    Route::post('verificar_documento', 'AdministradorController@verificarDocumento')->name('verificar_documento');
});

// ========================================================================

// RUTAS PERMISOS
Route::group(['namespace' => 'App\Http\Controllers\permisos'], function () {
    Route::resource('permisos', 'PermisosController');
    Route::post('permiso_update', 'PermisosController@update')->name('permiso_update');
});

// ========================================================================

// RUTAS DEL CLIENTE
Route::group(['namespace' => 'App\Http\Controllers\cliente_potencial'], function () {
    Route::resource('cliente_potencial', 'ClientePotencialController');
    // Route::get('ver_cliente/{id}', 'ClientePotencialController@show')->name('ver_cliente');
    Route::get('editar_cliente/{idCliente}', 'ClientePotencialController@edit')->name('editar_cliente');
    Route::post('verificar_celular', 'ClientePotencialController@verificarCelular')->name('verificar_celular');
    Route::post('consultar_ciudad_dpto', 'ClientePotencialController@consultarCiudadDpto')->name('consultar_ciudad_dpto');
});
// ========================================================================

// RUTAS CREACIÓN/EDICIÓN EMPRESAS (Dirigido a)
Route::group(['namespace' => 'App\Http\Controllers\dirigido_empresa'], function () {
    Route::resource('dirigido_empresa', 'DirigidoEmpresaController');
    Route::post('validar_empresa', 'DirigidoEmpresaController@validarEmpresa')->name('validar_empresa');
    Route::post('editar_empresa', 'DirigidoEmpresaController@update')->name('editar_empresa');
});
// ========================================================================

// RUTAS DE LA VISITA
Route::group(['namespace' => 'App\Http\Controllers\visita'], function () {
    Route::resource('visita', 'VisitaController');
    Route::get('crear_visita/{idCliente}', 'VisitaController@create')->name('crear_visita');
    Route::post('consultar_empresa', 'VisitaController@consultarEmpresa')->name('consultar_empresa');
    Route::get('editar_visita/{id}', 'VisitaController@edit')->name('editar_visita');
    Route::post('visita_cliente_update', 'VisitaController@visitaClienteUpdate')->name('visita_cliente_update');
    Route::post('visita_tecnica_update', 'VisitaController@visitaTecnicaUpdate')->name('visita_tecnica_update');
    Route::post('visita_info_juridica_update', 'VisitaController@visitaInfoJuridicaUpdate')->name('visita_info_juridica_update');
    Route::post('visita_info_inmueble_update', 'VisitaController@visitaInfoInmuebleUpdate')->name('visita_info_inmueble_update');
    Route::post('visita_caracteristicas_inmueble_update', 'VisitaController@visitaCaracteristicasInmuebleUpdate')->name('visita_caracteristicas_inmueble_update');
    Route::post('visita_acabados_inmueble_update', 'VisitaController@visitaAcabadosInmuebleUpdate')->name('visita_acabados_inmueble_update');
    Route::post('visita_calificacion_inmueble_update', 'VisitaController@visitaCalificacionInmuebleUpdate')->name('visita_calificacion_inmueble_update');
    Route::post('visita_dotacion_comunal_update', 'VisitaController@visitaDotacionComunalUpdate')->name('visita_dotacion_comunal_update');
    Route::post('visita_info_sector_update', 'VisitaController@visitaInfoSectorUpdate')->name('visita_info_sector_update');
    Route::post('visita_condi_urbanisticas_update', 'VisitaController@visitaCondiUrbanisticasUpdate')->name('visita_condi_urbanisticas_update');
    Route::post('visita_obser_generales_update', 'VisitaController@visitaObserGeneralesUpdate')->name('visita_obser_generales_update');
    Route::post('visita_reg_fotografico_update', 'VisitaController@visitaRegFotograficoUpdate')->name('visita_reg_fotografico_update');
    Route::post('visita_valor_estimado_update', 'VisitaController@visitaValorEstimadoUpdate')->name('visita_valor_estimado_update');
    Route::post('visita_estado_conservacion_update', 'VisitaController@visitaEstadoConservacionUpdate')->name('visita_estado_conservacion_update');
    Route::post('consultar_factor_pendiente', 'VisitaController@consultarFactorPendiente')->name('consultar_factor_pendiente');
    Route::post('consultar_factor_ubicacion', 'VisitaController@consultarFactorUbicacion')->name('consultar_factor_ubicacion');
    Route::post('visita_direccion', 'VisitaController@visitaDireccion')->name('visita_direccion');
});

// ========================================================================

// RUTAS DEL CALENDARIO
Route::group(['namespace' => 'App\Http\Controllers\calendario'], function () {
    Route::resource('calendario', 'CalendarioController');
    Route::post('consultar_visitas_calendario', 'CalendarioController@consultarVisitasCalendario')->name('consultar_visitas_calendario');
    Route::post('consultar_visita_calendario', 'CalendarioController@consultarVisitaCalendario')->name('consultar_visita_calendario');
    Route::post('editar_visita_calendario', 'CalendarioController@update')->name('editar_visita_calendario');
});

// ========================================================================

// RUTAS AVALÚO
Route::group(['namespace' => 'App\Http\Controllers\avaluo'], function () {
    Route::resource('avaluos', 'AvaluoController');
    Route::get('calcular_avaluo/{idVisita}', 'AvaluoController@edit')->name('calcular_avaluo');
    Route::post('avaluo_cliente_update', 'AvaluoController@avaluoClienteUpdate')->name('avaluo_cliente_update');
    Route::post('avaluo_visita_tecnica_update', 'AvaluoController@avaluoVisitaTecnicaUpdate')->name('avaluo_visita_tecnica_update');
    Route::post('avaluo_info_inmueble_update', 'AvaluoController@avaluoInfoInmuebleUpdate')->name('avaluo_info_inmueble_update');
    Route::post('avaluo_info_juridica_update', 'AvaluoController@avaluoInfoJuridicaUpdate')->name('avaluo_info_juridica_update');
    Route::post('avaluo_caracteristicas_inmueble_update', 'AvaluoController@avaluoCaracteristicasInmuebleUpdate')->name('avaluo_caracteristicas_inmueble_update');
    Route::post('avaluo_acabados_inmueble_update', 'AvaluoController@avaluoAcabadosInmuebleUpdate')->name('avaluo_acabados_inmueble_update');
    Route::post('avaluo_calificacion_inmueble_update', 'AvaluoController@avaluoCalificacionInmuebleUpdate')->name('avaluo_calificacion_inmueble_update');
    Route::post('avaluo_dotacion_comunal_update', 'AvaluoController@avaluoDotacionComunalUpdate')->name('avaluo_dotacion_comunal_update');
    Route::post('avaluo_info_sector_update', 'AvaluoController@avaluoInfoSectorUpdate')->name('avaluo_info_sector_update');
    Route::post('avaluo_condi_urbanisticas_update', 'AvaluoController@avaluoCondiUrbanisticasUpdate')->name('avaluo_condi_urbanisticas_update');
    Route::post('avaluo_obser_generales_update', 'AvaluoController@avaluoObserGeneralesUpdate')->name('avaluo_obser_generales_update');
    Route::post('avaluo_reg_fotografico_update', 'AvaluoController@avaluoRegFotograficoUpdate')->name('avaluo_reg_fotografico_update');
    Route::post('avaluo_valor_estimado_update', 'AvaluoController@avaluoValorEstimadoUpdate')->name('avaluo_valor_estimado_update');
    Route::post('avaluo_estado_conservacion_update', 'AvaluoController@avaluoEstadoConservacionUpdate')->name('avaluo_estado_conservacion_update');
    Route::post('consultar_factor_pendiente', 'AvaluoController@consultarFactorPendiente')->name('consultar_factor_pendiente');
    Route::post('consultar_factor_ubicacion', 'AvaluoController@consultarFactorUbicacion')->name('consultar_factor_ubicacion');
});

// ========================================================================

// RUTA PARA SERVIDOR REMOTO (CPANEL) DEL STORAGE:LINK
Route::get('storage-link', function(){
    Artisan::call('storage:link');

    if (file_exists(public_path('storage'))) {
        return 'El directorio "public/storage" ya existe';
    }

    app('files')->link(
        storage_path(('app/public')), public_path('storage')
    );

    return 'El directorio "public/storage" ha sido vinculado (linked)';
});


// });
// });
