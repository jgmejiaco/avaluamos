<?php

namespace App\Http\Controllers\inicio_sesion;

use App\Http\Controllers\Controller;
use App\Http\Responsable\inicio_sesion\RecuperarClaveConsultar;

class InicioSesionController extends Controller
{
    public function recuperarClaveConsultar()
    {
        return new RecuperarClaveConsultar();
    }
}
