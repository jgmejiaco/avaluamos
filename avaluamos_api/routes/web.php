<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

//  https://diarioprogramador.com/crear-api-rest-con-laravel-lumen/

// RUTAS AVALÚO
$router->group(['prefix' => 'api'], function () use ($router) {
//   $router->get('products', 'ProductController@index');
//   $router->post('products', 'ProductController@create');
//   $router->get('products/{id}', 'ProductController@show');
//   $router->delete('products/{id}', 'ProductController@destroy');
//   $router->post('products/{id}', 'ProductController@update');
    $router->get('avaluo_index', 'avaluo\AvaluoController@index');
    $router->get('avaluo_cliente_show/{id}', 'avaluo\AvaluoController@show');
    $router->put('avaluo_cliente_update/{id}', 'avaluo\AvaluoController@avaluoClienteUpdate');
});


