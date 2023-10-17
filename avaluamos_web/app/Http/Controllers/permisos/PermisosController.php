<?php

namespace App\Http\Controllers\permisos;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Rol;
use App\Http\Responsable\permisos\PermisoUpdate;
use App\Http\Controllers\admin\AdministradorController;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $adminCtrl = new AdministradorController();
            $sesion = $adminCtrl->validarVariablesSesion();

            if (empty($sesion[0]) || is_null($sesion[0]) &&
                empty($sesion[1]) || is_null($sesion[1]) &&
                empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
            {
                return view('inicio_sesion.login');
            } else {
                $this->shareData();
                return view('permisos.index');
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('login'));
        }
    }

    // ==========================================================================

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    // ==========================================================================

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    // ==========================================================================

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    // ==========================================================================

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    // ==========================================================================

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $adminCtrl = new AdministradorController();
            $sesion = $adminCtrl->validarVariablesSesion();

            if (empty($sesion[0]) || is_null($sesion[0]) &&
                empty($sesion[1]) || is_null($sesion[1]) &&
                empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
            {
                return view('inicio_sesion.login');
            } else {
                return new PermisoUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('login'));
        }
    }

    // ==========================================================================

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    // ==========================================================================

    private function shareData()
    {
        view()->share('roles', $this->rolesPermisos());
        // view()->share('roles', Rol::select('id_rol','nombre_rol')->orderBy('nombre_rol', 'asc')->get());
        // view()->share('', ::orderBy('', 'asc')->pluck('', ''));
        // view()->share('', ::orderBy('', 'asc')->pluck('', ''));
    }

    // ==========================================================================

    public function rolesPermisos()
    {
        return Rol::select( 'id_rol',
                            'nombre_rol',
                            'mod_usuario',
                            'mod_clientes',
                            'mod_calendario',
                            'mod_avaluo',
                            'mod_informes'
                        )
                        ->orderBy('nombre_rol', 'asc')
                        ->get();
    }



    
}
