<?php

namespace App\Http\Controllers\traits;

use App\Http\Controllers\Controller;
use App\Http\Responsable\traits\TraitAppWeb;
use Illuminate\Http\Request;

class TraitsController extends Controller
{
    public function getConfigInicial(Request $request)
    {
        $configuracion = new TraitAppWeb();

        return $configuracion->getConfigInicial();
    }
}
