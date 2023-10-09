<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Route::get('editar_cliente/{idCliente}', 'cliente_potencial\ClientePotencialController@edit')->name('editar_cliente');
$router->get('ver_index', 'cliente_potencial\ClientePotencialControllerCopy@index');


  // RUTAS AVALÚO
  Route::post('avaluo_cliente_update/{id}', 'avaluo\AvaluoController@avaluoClienteUpdate')->name('avaluo_cliente_update');
