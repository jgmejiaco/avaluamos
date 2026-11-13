<?php

namespace App\Http\Controllers\salud;

use App\Http\Controllers\Controller;
use App\Http\Responsable\salud\SaludConsulta;

class SaludController extends Controller
{
    public function index()
    {
        return new SaludConsulta();
    }
}
