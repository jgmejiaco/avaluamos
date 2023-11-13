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
Route::resource('login', 'inicio_sesion\LoginController');
Route::get('login_usuario', 'inicio_sesion\LoginController@index')->name('login_usuario');
Route::get('logout', 'inicio_sesion\LoginController@logout')->name('logout');

// Rutas recuperacion clave
Route::get('recuperar', 'inicio_sesion\LoginController@resetPassword')->name('recuperar_clave');
Route::post('validar', 'inicio_sesion\LoginController@validarDatos')->name('validar_datos');
Route::get('actualizar/{expiration}', 'inicio_sesion\LoginController@actualizarContraseña')->name('actualizar_clave');

// ========================================================================

// RUTA AL INICIAR SESIÓN
Route::resource('home', 'home\HomeController');

// ========================================================================

// RUTAS DEL ADMINISTRADOR
Route::resource('administrador', 'admin\AdministradorController');
Route::post('editar_usuario', 'admin\AdministradorController@update')->name('editar_usuario');
Route::post('verificar_documento', 'admin\AdministradorController@verificarDocumento')->name('verificar_documento');

// ========================================================================

// RUTAS PERMISOS
Route::resource('permisos', 'permisos\PermisosController');
Route::post('permiso_update', 'permisos\PermisosController@update')->name('permiso_update');

// ========================================================================

// RUTAS DEL CLIENTE
Route::resource('cliente_potencial', 'cliente_potencial\ClientePotencialController');
// Route::get('ver_cliente/{id}', 'cliente_potencial\ClientePotencialController@show')->name('ver_cliente');
Route::get('editar_cliente/{idCliente}', 'cliente_potencial\ClientePotencialController@edit')->name('editar_cliente');
Route::post('verificar_celular', 'cliente_potencial\ClientePotencialController@verificarCelular')->name('verificar_celular');
Route::post('consultar_ciudad_dpto', 'cliente_potencial\ClientePotencialController@consultarCiudadDpto')->name('consultar_ciudad_dpto');

// ========================================================================

// RUTAS CREACIÓN/EDICIÓN EMPRESAS (Dirigido a)
Route::resource('dirigido_empresa', 'dirigido_empresa\DirigidoEmpresaController');
Route::post('validar_empresa', 'dirigido_empresa\DirigidoEmpresaController@validarEmpresa')->name('validar_empresa');
Route::post('editar_empresa', 'dirigido_empresa\DirigidoEmpresaController@update')->name('editar_empresa');

// ========================================================================

// RUTAS DE LA VISITA
Route::resource('visita', 'visita\VisitaController');
Route::get('crear_visita/{idCliente}', 'visita\VisitaController@create')->name('crear_visita');
Route::post('consultar_empresa', 'visita\VisitaController@consultarEmpresa')->name('consultar_empresa');
Route::get('editar_visita/{id}', 'visita\VisitaController@edit')->name('editar_visita');
Route::post('visita_cliente_update', 'visita\VisitaController@visitaClienteUpdate')->name('visita_cliente_update');
Route::post('visita_tecnica_update', 'visita\VisitaController@visitaTecnicaUpdate')->name('visita_tecnica_update');
Route::post('visita_info_juridica_update', 'visita\VisitaController@visitaInfoJuridicaUpdate')->name('visita_info_juridica_update');
Route::post('visita_info_inmueble_update', 'visita\VisitaController@visitaInfoInmuebleUpdate')->name('visita_info_inmueble_update');
Route::post('visita_caracteristicas_inmueble_update', 'visita\VisitaController@visitaCaracteristicasInmuebleUpdate')->name('visita_caracteristicas_inmueble_update');
Route::post('visita_acabados_inmueble_update', 'visita\VisitaController@visitaAcabadosInmuebleUpdate')->name('visita_acabados_inmueble_update');
Route::post('visita_calificacion_inmueble_update', 'visita\VisitaController@visitaCalificacionInmuebleUpdate')->name('visita_calificacion_inmueble_update');
Route::post('visita_dotacion_comunal_update', 'visita\VisitaController@visitaDotacionComunalUpdate')->name('visita_dotacion_comunal_update');
Route::post('visita_info_sector_update', 'visita\VisitaController@visitaInfoSectorUpdate')->name('visita_info_sector_update');
Route::post('visita_condi_urbanisticas_update', 'visita\VisitaController@visitaCondiUrbanisticasUpdate')->name('visita_condi_urbanisticas_update');
Route::post('visita_obser_generales_update', 'visita\VisitaController@visitaObserGeneralesUpdate')->name('visita_obser_generales_update');
Route::post('visita_reg_fotografico_update', 'visita\VisitaController@visitaRegFotograficoUpdate')->name('visita_reg_fotografico_update');
Route::post('visita_valor_estimado_update', 'visita\VisitaController@visitaValorEstimadoUpdate')->name('visita_valor_estimado_update');
Route::post('visita_estado_conservacion_update', 'visita\VisitaController@visitaEstadoConservacionUpdate')->name('visita_estado_conservacion_update');
Route::post('consultar_factor_pendiente', 'visita\VisitaController@consultarFactorPendiente')->name('consultar_factor_pendiente');
Route::post('consultar_factor_ubicacion', 'visita\VisitaController@consultarFactorUbicacion')->name('consultar_factor_ubicacion');

// ========================================================================

// RUTAS DEL CALENDARIO
Route::resource('calendario', 'calendario\CalendarioController');
Route::post('consultar_visitas_calendario', 'calendario\CalendarioController@consultarVisitasCalendario')->name('consultar_visitas_calendario');
Route::post('consultar_visita_calendario', 'calendario\CalendarioController@consultarVisitaCalendario')->name('consultar_visita_calendario');
Route::post('editar_visita_calendario', 'calendario\CalendarioController@update')->name('editar_visita_calendario');

// ========================================================================

// RUTAS AVALÚO
Route::resource('avaluos', 'avaluo\AvaluoController');
Route::get('calcular_avaluo/{idVisita}', 'avaluo\AvaluoController@edit')->name('calcular_avaluo');
Route::post('avaluo_cliente_update', 'avaluo\AvaluoController@avaluoClienteUpdate')->name('avaluo_cliente_update');
Route::post('avaluo_visita_tecnica_update', 'avaluo\AvaluoController@avaluoVisitaTecnicaUpdate')->name('avaluo_visita_tecnica_update');
Route::post('avaluo_info_inmueble_update', 'avaluo\AvaluoController@avaluoInfoInmuebleUpdate')->name('avaluo_info_inmueble_update');
Route::post('avaluo_info_juridica_update', 'avaluo\AvaluoController@avaluoInfoJuridicaUpdate')->name('avaluo_info_juridica_update');
Route::post('avaluo_caracteristicas_inmueble_update', 'avaluo\AvaluoController@avaluoCaracteristicasInmuebleUpdate')->name('avaluo_caracteristicas_inmueble_update');
Route::post('avaluo_acabados_inmueble_update', 'avaluo\AvaluoController@avaluoAcabadosInmuebleUpdate')->name('avaluo_acabados_inmueble_update');
Route::post('avaluo_calificacion_inmueble_update', 'avaluo\AvaluoController@avaluoCalificacionInmuebleUpdate')->name('avaluo_calificacion_inmueble_update');
Route::post('avaluo_dotacion_comunal_update', 'avaluo\AvaluoController@avaluoDotacionComunalUpdate')->name('avaluo_dotacion_comunal_update');
Route::post('avaluo_info_sector_update', 'avaluo\AvaluoController@avaluoInfoSectorUpdate')->name('avaluo_info_sector_update');
Route::post('avaluo_condi_urbanisticas_update', 'avaluo\AvaluoController@avaluoCondiUrbanisticasUpdate')->name('avaluo_condi_urbanisticas_update');
Route::post('avaluo_obser_generales_update', 'avaluo\AvaluoController@avaluoObserGeneralesUpdate')->name('avaluo_obser_generales_update');
Route::post('avaluo_reg_fotografico_update', 'avaluo\AvaluoController@avaluoRegFotograficoUpdate')->name('avaluo_reg_fotografico_update');
Route::post('avaluo_valor_estimado_update', 'avaluo\AvaluoController@avaluoValorEstimadoUpdate')->name('avaluo_valor_estimado_update');
Route::post('avaluo_estado_conservacion_update', 'avaluo\AvaluoController@avaluoEstadoConservacionUpdate')->name('avaluo_estado_conservacion_update');
Route::post('consultar_factor_pendiente', 'avaluo\AvaluoController@consultarFactorPendiente')->name('consultar_factor_pendiente');
Route::post('consultar_factor_ubicacion', 'avaluo\AvaluoController@consultarFactorUbicacion')->name('consultar_factor_ubicacion');

// ========================================================================

// RUTA PARA SERVIDOR REMOTO (CPANEL) DEL STORAGE:LINK
Route::get('storage-link', function(){
    // Artisan::call('storage:link');

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
