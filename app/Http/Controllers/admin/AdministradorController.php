<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuarios;
use App\Models\Persona;
use App\Models\Rol;
use App\Models\Cargo;
use App\Models\TipoDocumento;
use App\Models\Ciudad;
use App\Models\Estado;
use App\Http\Responsable\admin\UsuarioStore;
// use App\Http\Responsable\administrador\DisponibilidadShow;
// use App\Http\Responsable\administrador\UsuariosShow;
// use App\Http\Responsable\administrador\UsuariosUpdate;

class AdministradorController extends Controller
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
        $this->share_data();
        return view('administrador.index');
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
        $this->share_data();
        return view('administrador.create');
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
        return new UsuarioStore();
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

    private function share_data()
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

            $consulta_personas = DB::table('personas')
                            ->join('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'personas.id_tipo_documento')
                            ->join('rol', 'rol.id_rol', '=', 'personas.id_rol')
                            ->join('cargo', 'cargo.id_cargo', '=', 'personas.id_cargo')
                            // ->join('municipios', 'municipios.id_municipio', '=', 'usuarios.id_municipio_nacimiento')
                            // ->join('municipios as residencia', 'residencia.id_municipio', '=', 'usuarios.id_municipio_residencia')
                            // ->leftJoin('niveles', 'niveles.id_nivel', '=', 'usuarios.id_nivel')
                            // ->leftJoin('tipo_ingles', 'tipo_ingles.id', '=', 'usuarios.id_tipo_ingles')
                            ->select('personas.nombre_usuario',
                                    'personas.nombres',
                                    'personas.apellidos',
                                    'tipo_documento.decripcion_documento',
                                    'personas.numero_documento',
                                    'personas.correo',
                                    'rol.nombre_rol',
                                    'cargo.descripcion_cargo'
                                    // 'usuarios.direccion_residencia',
                                    // 'roles.id_rol',
                                    //  'usuarios.fecha_nacimiento',
                                    //  'usuarios.genero', 'usuarios.estado',
                                    //  'usuarios.telefono', 'usuarios.celular',
                                    //  'usuarios.contacto2', 'usuarios.contacto_opcional',
                                    //  'usuarios.skype', 'usuarios.zoom',
                                    //  'usuarios.fecha_ingreso_sistema AS fecha_ingreso',
                                    //  'municipios.descripcion AS ciudad_nacimiento',
                                    //  'residencia.descripcion AS ciudad_residencia',
                                    //  'niveles.nivel_descripcion AS niveles',
                                    //  'niveles.id_nivel',
                                    //  'tipo_ingles.id AS id_tip_ing',
                                    //  'tipo_ingles.descripcion AS desc_tip_ing'
                                    )
                            // ->whereNull('usuarios.deleted_at')
                            // ->whereNull('tipo_documento.deleted_at')
                            // ->whereNull('municipios.deleted_at')
                            // ->whereNull('residencia.deleted_at')
                            // ->whereNull('roles.deleted_at')
                            // ->whereNull('niveles.deleted_at')
                            ->get()
                            ->toarray();

            return $consulta_personas;

       }
       catch (Exception $e)
       {
           alert()->error('Error', 'An error has occurred, try again, if the problem persists contact support.');
           return back();
       }
    }

    public function tipos_documento()
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     $usuariosShow = new  UsuariosShow();
        //    return $usuariosShow->tiposDocumento();
        // }
    }

    public function municipios()
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     $usuariosShow = new  UsuariosShow();
        //    return $usuariosShow->municipios();
        // }
    }

    public function roles()
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     $usuariosShow = new  UsuariosShow();
        //    return $usuariosShow->roles();
        // }
    }

    public function validarCedula(Request $request)
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     $usuariosShow = new  UsuariosShow();
        //    return $usuariosShow->validarDocumento($request);
        // }
    }

    public function validarCedulaEdicion(Request $request)
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     $usuariosShow = new  UsuariosShow();
        //    return $usuariosShow->validarDocumentoEdicion($request);
        // }
    }

    public function validarCorreo(Request $request)
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     $usuariosShow = new  UsuariosShow();
        //    return $usuariosShow->validarCorreo($request);
        // }
    }

    public function validarCorreoEdicion(Request $request)
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     $usuariosShow = new  UsuariosShow();
        //    return $usuariosShow->validarCorreoEdicion($request);
        // }
    }

    public function cambiarEstadoUsuario(Request $request)
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     $usuariosUpd = new UsuariosUpdate();
        //      return $usuariosUpd->cambiarEstado($request);
        // }
    }

    public function actualizarClave(Request $request)
    {
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
        //     $usuariosUpd = new UsuariosUpdate();
        //     return $usuariosUpd->cambiarClave($request);
        // }
    }

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
