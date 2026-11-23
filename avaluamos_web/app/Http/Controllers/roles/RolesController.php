<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use App\Http\Responsable\roles\RolEdit;
use App\Http\Responsable\roles\RolIndex;
use App\Http\Responsable\roles\RolStore;
use App\Http\Responsable\roles\RolUpdate;
use App\Support\FalloServicio;
use Exception;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('compartirShareData');
    }

    public function index()
    {
        try {
            return new RolIndex();
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error('Error consultando roles.');
            return redirect()->route('home.index');
        }
    }

    public function store(Request $request)
    {
        try {
            return new RolStore();
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error('Error creando el rol.');
            return redirect()->route('roles.index');
        }
    }

    public function edit($role)
    {
        try {
            return new RolEdit($role);
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error('Error cargando el rol.');
            return redirect()->route('roles.index');
        }
    }

    public function update(Request $request, $role)
    {
        try {
            return new RolUpdate($role);
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error('Error actualizando el rol.');
            return redirect()->route('roles.index');
        }
    }
}
