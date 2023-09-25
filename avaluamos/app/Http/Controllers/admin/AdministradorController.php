<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuarios;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Cargo;
use App\Models\TipoDocumento;
use App\Models\Ciudad;
use App\Models\Estado;
use App\Http\Responsable\admin\UsuarioStore;
use App\Http\Responsable\admin\UsuarioUpdate;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // try {
            // $sesion = $this->validarVariablesSesion();

            // if (empty($sesion[0]) || is_null($sesion[0]) &&
            //     empty($sesion[1]) || is_null($sesion[1]) &&
            //     empty($sesion[2]) || is_null($sesion[2]) &&
            //     empty($sesion[3]) || is_null($sesion[3]) && $sesion[3] != true)
            // {
            //     return redirect()->to(route('inicio'));
            // } else {
                $this->shareData();
                return view('administrador.index');
        //     }
        // } catch (Exception $e) {
        //     // dd($e);
        //     alert()->error("Ha ocurrido un error!");
        // }
    }

    // ==========================================================================

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
        //    empty($sesion[3]) || is_null($sesion[3]) && $sesion[3] != true)
        // {
        //     return redirect()->to(route('inicio'));
        // } else {
            $this->shareData();
            return view('administrador.create');
        // }
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
        
        return new UsuarioStore();
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
    //  * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return new UsuarioUpdate();
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
        view()->share('rol', Rol::orderBy('nombre_rol','asc')->pluck('nombre_rol', 'id_rol'));
        view()->share('cargo', Cargo::orderBy('descripcion_cargo','asc')->pluck('descripcion_cargo', 'id_cargo'));
        view()->share('descripcion_documento', TipoDocumento::orderBy('decripcion_documento','asc')->pluck('decripcion_documento', 'id_tipo_documento'));
        view()->share('ciudad', Ciudad::orderBy('descripcion_ciudad','asc')->pluck('descripcion_ciudad', 'id_ciudad'));
        view()->share('estado', Estado::orderBy('descripcion_estado','asc')->pluck('descripcion_estado', 'id_estado'));
        view()->share('usuarios', $this->todosLosUsuarios());
    }

    // ==========================================================================

    public function todosLosUsuarios()
    {
       try {
            return DB::table('usuarios')
                            ->leftjoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'usuarios.id_tipo_documento')
                            ->leftjoin('rol', 'rol.id_rol', '=', 'usuarios.id_rol')
                            ->leftjoin('cargo', 'cargo.id_cargo', '=', 'usuarios.id_cargo')
                            ->leftjoin('estado', 'estado.id_estado', '=', 'usuarios.id_estado')
                            ->select('usuarios.id_usuario',
                                    'usuarios.nombre_usuario',
                                    'usuarios.nombres',
                                    'usuarios.apellidos',
                                    'tipo_documento.id_tipo_documento',
                                    'tipo_documento.decripcion_documento',
                                    'usuarios.numero_documento',
                                    'usuarios.correo',
                                    'usuarios.celular',
                                    'rol.id_rol',
                                    'rol.nombre_rol',
                                    'cargo.id_cargo',
                                    'cargo.descripcion_cargo',
                                    'estado.id_estado',
                                    'estado.descripcion_estado',
                                    )
                            ->get()
                            ->toarray();

       } catch (Exception $e) {
           alert()->error('Error', 'An error has occurred, try again, if the problem persists contact support.');
           return back();
       }
    }

    // ==========================================================================

    public function validarVariablesSesion()
    {
        // $variablesSesion =[];

        // $idUsuario = session('id_usuario');
        // array_push($variablesSesion, $idUsuario);

        // $username = session('usuario');
        // array_push($variablesSesion, $username);

        // $rolUsuario = session('id_rol');
        // array_push($variablesSesion, $rolUsuario);

        // $sesionIniciada = session('sesion_iniciada');
        // array_push($variablesSesion, $sesionIniciada);

        // return $variablesSesion;
    }

    // ==========================================================================

    // public function tipos_documento()
    // {
        
    // }

    // ==========================================================================

    
    // ==========================================================================

    

    // ==========================================================================

    

    // ==========================================================================

    

    // ==========================================================================

    

    // ==========================================================================

    

    // ==========================================================================

    // public function cambiarEstadoUsuario(Request $request)
    // {
        
    // }

    // ==========================================================================

    // public function actualizarClave(Request $request)
    // {
        
    // }

    
}
