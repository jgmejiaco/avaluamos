<?php

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

// Route::get('/', function () {
//     return view('inicio');
// });

Route::get('/', function () {
    return view('inicio_sesion.login');
})->name('inicio');

// Route::group(['middleware' => ['auth', 'password_expired']], function () {

// });

// Rutas del Login
Route::resource('login', 'inicio_sesion\LoginController');
Route::get('login_usuario', 'inicio_sesion\LoginController@index')->name('login_usuario');
Route::get('logout', 'inicio_sesion\LoginController@logout')->name('logout');

// ========================================================================

// RUTAS DEL ADMINISTRADOR
Route::resource('administrador', 'admin\AdministradorController');

// ========================================================================

// RUTAS PERMISOS
Route::resource('permisos', 'permisos\PermisosController');

// ========================================================================

// RUTAS DEL CLIENTE
Route::resource('cliente_potencial', 'cliente_potencial\ClientePotencialController');
Route::get('ver_cliente/{id}', 'cliente_potencial\ClientePotencialController@show')->name('ver_cliente');
Route::post('editar_cliente', 'cliente_potencial\ClientePotencialController@update')->name('editar_cliente');

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
// Route::post('visita_reg_fotografico_update', 'visita\VisitaController@visitaRegFotograficoUpdate')->name('visita_reg_fotografico_update');
Route::post('visita_valor_estimado_update', 'visita\VisitaController@visitaValorEstimadoUpdate')->name('visita_valor_estimado_update');
Route::post('visita_estado_conservacion_update', 'visita\VisitaController@visitaEstadoConservacionUpdate')->name('visita_estado_conservacion_update');
Route::post('consultar_factor_pendiente', 'visita\VisitaController@consultarFactorPendiente')->name('consultar_factor_pendiente');
Route::post('consultar_factor_ubicacion', 'visita\VisitaController@consultarFactorUbicacion')->name('consultar_factor_ubicacion');

// ========================================================================

// RUTAS DEL CALENDARIO
Route::resource('calendario', 'calendario\CalendarioController');

// ========================================================================
