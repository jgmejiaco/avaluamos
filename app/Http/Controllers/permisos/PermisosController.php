<?php

namespace App\Http\Controllers\permisos;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rol;
use App\Http\Responsable\permisos\PermisoStore;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    empty($sesion[3]) || is_null($sesion[3]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {

        //     $this->share_data();
        //     return view('administrador.index');
        // }
        $this->shareData();
        return view('permisos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     $this->share_data();
        //     return view('administrador.create');
        // }
        $this->shareData();
        return view('visita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     return new UsuarioStore();
        // }
        return new VisitaStore();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     $usuario = User::find($id);
        //     view()->share('usuario', $usuario);
        //     $this->share_data();
        //     return view('administrador.show');
        // }

        $this->share_data();
        // return view('visita.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     $usuario = User::find($id);
        //     view()->share('usuario', $usuario);
        //     $this->share_data();
        //     return view('administrador.edit');
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     return new UsuariosUpdate();
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {

        // }
    }

    private function shareData()
    {
        view()->share('roles', Rol::select('id_rol','nombre_rol')->orderBy('nombre_rol', 'asc')->get()->toArray());
        // view()->share('', ::orderBy('', 'asc')->pluck('', ''));
        // view()->share('', ::orderBy('', 'asc')->pluck('', ''));
        // view()->share('usuarios', $this->todosLosUsuarios());
    }

    // ==========================================================================


    public function validarVariablesSesion()
    {
        // $variables_sesion =[];
        // $id_usuario = session('usuario_id');
        // array_push($variables_sesion, $id_usuario);
        // $username = session('username');
        // array_push($variables_sesion, $username);
        // $sesion_iniciada = session('sesion_iniciada');
        // array_push($variables_sesion, $sesion_iniciada);
        // $rol_usuario = session('rol');
        // array_push($variables_sesion, $rol_usuario);
        // return $variables_sesion;
    }
}
