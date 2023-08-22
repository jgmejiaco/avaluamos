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
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('inicio');
// });

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('inicio_sesion.login');
})->name('inicio');

// Rutas del Login
Route::resource('login', 'inicio_sesion\LoginController');
Route::get('login_usuario', 'inicio_sesion\LoginController@index')->name('login_usuario');
// Route::get('login_colaborador', 'inicio_sesion\LoginController@loginColaborador')->name('login_colaborador');

// RUTAS DEL ADMINISTRADOR
Route::resource('administrador', 'admin\AdministradorController');

// RUTAS PERMISOS
Route::resource('permisos', 'permisos\PermisosController');

// RUTAS DE LA VISITA
Route::resource('visita', 'visita\VisitaController');

// RUTAS DEL CALENDARIO
Route::resource('calendario', 'calendario\CalendarioController');

// RUTAS DEL CLIENTE POTENCIAL
Route::resource('cliente_potencial', 'cliente_potencial\ClientePotencialController');


