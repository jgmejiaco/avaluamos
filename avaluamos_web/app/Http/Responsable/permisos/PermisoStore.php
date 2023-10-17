<?php

namespace App\Http\Responsable\permisos;

use App\User;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use App\Models\Usuario;
use Jenssegers\Date\Date;

class PermisoStore implements Responsable
{
    public function toResponse($request)
    {
        // dd($request);

       
    }
}
