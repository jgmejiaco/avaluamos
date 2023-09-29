<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

trait MetodosTrait
{
    public function checkDatabaseConnection($rutaPerfil)
    {
        // dd($rutaPerfil);
        try {
           DB::connection()->getPdo();
           return view($rutaPerfil);
        } catch (\Exception $e) {
            // dd($e);
            return View::make('db_conexion');
            // return view('db_conexion');
        }
    }
}
