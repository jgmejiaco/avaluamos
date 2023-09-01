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

// RUTAS DE LA VISITA
Route::resource('visita', 'visita\VisitaController');

// ========================================================================

// RUTAS DEL CLIENTE POTENCIAL
Route::resource('cliente_potencial', 'cliente_potencial\ClientePotencialController');
Route::post('consultar_empresa', 'cliente_potencial\ClientePotencialController@consultarEmpresa')->name('consultar_empresa');

// ========================================================================

// RUTAS CREACIÓN/ EDICIÓN EMPRESAS (Dirigido a)
Route::resource('dirigido_empresa', 'dirigido_empresa\DirigidoEmpresaController');
Route::post('validar_empresa', 'dirigido_empresa\DirigidoEmpresaController@validarEmpresa')->name('validar_empresa');
Route::post('editar_empresa', 'dirigido_empresa\DirigidoEmpresaController@update')->name('editar_empresa');

// ========================================================================

// RUTAS DEL CALENDARIO
Route::resource('calendario', 'calendario\CalendarioController');

// ========================================================================
