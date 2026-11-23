<?php

namespace App\Http\Controllers\asignar_permisos;

use App\Http\Controllers\Controller;
use App\Http\Responsable\asignar_permisos\AsignarPermisoIndex;
use App\Http\Responsable\asignar_permisos\AsignarPermisoStore;
use App\Http\Responsable\asignar_permisos\ConsultarPermisosRol;
use App\Support\FalloServicio;
use Exception;
use Illuminate\Http\Request;

class AsignarPermisosController extends Controller
{
    public function __construct()
    {
        $this->middleware('compartirShareData');
    }

    public function index()
    {
        try {
            return new AsignarPermisoIndex();
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error('Error cargando asignación de permisos.');
            return redirect()->route('home.index');
        }
    }

    public function store(Request $request)
    {
        try {
            return new AsignarPermisoStore();
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error('Error asignando permisos.');
            return redirect()->route('asignar_permisos.index');
        }
    }

    public function consultarPermisosRol(Request $request)
    {
        try {
            return new ConsultarPermisosRol();
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            return response()->json([
                'success' => false,
                'message' => 'Error consultando permisos del rol',
            ], 500);
        }
    }
}
