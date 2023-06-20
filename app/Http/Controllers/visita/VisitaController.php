<?php

namespace App\Http\Controllers\visita;

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
use App\Models\Pais;
use App\Models\DepartamentoEstado;
use App\Models\Municipio;
use App\Models\TipoVivienda;
use App\Models\TipoInmueble;
use App\Models\UsoInmueble;
use App\Models\Topografia;
use App\Models\Forma;
use App\Models\IndicadorNumerico;
use App\Models\SiNo;
use App\Models\SistemaConstructivo;
use App\Models\PuertasMaterial;
use App\Models\TipoFachada;
use App\Models\TipoMuro;
use App\Models\Ventaneria;
use App\Models\TipoTecho;
use App\Models\Empresa;
use App\Models\TipoSuelo;
use App\Models\CondicionInmueble;
use App\Models\FittoCorvini;
use App\Models\Valorizacion;
use App\Models\CalificacionGeneral;
use App\Models\TipoVias;
use App\Http\Responsable\visita\VisitaStore;

class VisitaController extends Controller
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
        return view('visita.index');
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
        return view('visita.edit');
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
        // ->select(DB::raw("municipios.nombre || ' - ' || departamentos.nombre AS nombre_ciudad"), 'municipios.id')
        // view()->share('avaluador', Persona::select('id_persona',DB::raw("nombres || ' ' || apellidos AS nombre_avaluador"))
        //                                     ->whereIn(1,2)
        //                                     ->orderBy('nombres', 'asc')
        //                                     ->pluck('nombres', 'id_persona'));
        view()->share('avaluador', Persona::orderBy('nombres', 'asc')->pluck('nombres', 'id_persona'));
        view()->share('pais', Pais::orderBy('descripcion_pais', 'asc')->pluck('descripcion_pais', 'id_pais'));
        view()->share('departamento_estado', DepartamentoEstado::orderBy('descripcion_departamento', 'asc')->pluck('descripcion_departamento', 'id_departamento_estado'));
        view()->share('ciudad', Ciudad::orderBy('descripcion_ciudad', 'asc')->pluck('descripcion_ciudad', 'id_ciudad'));
        view()->share('tipo_vivienda', TipoVivienda::orderBy('tipo_vivienda', 'asc')->pluck('tipo_vivienda', 'id_tipo_vivienda'));
        view()->share('tipo_inmueble', TipoInmueble::orderBy('tipo_inmueble', 'asc')->pluck('tipo_inmueble', 'id_tipo_inmueble'));
        view()->share('uso_inmueble', UsoInmueble::orderBy('uso_inmueble', 'asc')->pluck('uso_inmueble', 'id_uso_inmueble'));
        view()->share('topografia', Topografia::orderBy('topografia', 'asc')->pluck('topografia', 'id_topografia'));
        view()->share('forma', Forma::orderBy('forma', 'asc')->pluck('forma', 'id_forma'));
        view()->share('indicador_numerico', IndicadorNumerico::orderBy('id_indicador_numerico', 'asc')->pluck('indicador_numerico', 'id_indicador_numerico'));
        view()->share('si_no', SiNo::orderBy('id_si_no', 'asc')->pluck('descripcion_si_no', 'id_si_no'));
        view()->share('sistema_constructivo', SistemaConstructivo::orderBy('sistema_constructivo', 'asc')->pluck('sistema_constructivo', 'id_sistema_constructivo'));
        view()->share('puertas_material', PuertasMaterial::orderBy('puertas_material', 'asc')->pluck('puertas_material', 'id_puertas_material'));
        view()->share('tipo_fachada', TipoFachada::orderBy('tipo_fachada', 'asc')->pluck('tipo_fachada', 'id_tipo_fachada'));
        view()->share('tipo_muro', TipoMuro::orderBy('tipo_muro', 'asc')->pluck('tipo_muro', 'id_tipo_muro'));
        view()->share('ventaneria', Ventaneria::orderBy('ventaneria', 'asc')->pluck('ventaneria', 'id_ventaneria'));
        view()->share('tipo_techo', TipoTecho::orderBy('tipo_techo', 'asc')->pluck('tipo_techo', 'id_tipo_techo'));
        view()->share('dirigido_a_empresa', Empresa::orderBy('nombre_empresa', 'asc')->pluck('nombre_empresa', 'id_empresa'));
        view()->share('tipo_suelo', TipoSuelo::orderBy('descripcion_tipo_suelo','asc')->pluck('descripcion_tipo_suelo', 'id_tipo_suelo'));
        view()->share('condicion_inmueble', CondicionInmueble::orderBy('condicion_inmueble', 'asc')->pluck('condicion_inmueble', 'id_condicion_inmueble'));
        view()->share('calificacion_fitto_corvini', FittoCorvini::orderBy('fitto_corvini', 'asc')->pluck('fitto_corvini', 'id_fitto_corvini'));
        view()->share('valorizacion', Valorizacion::orderBy('valorizacion', 'asc')->pluck('valorizacion', 'id_valorizacion'));
        view()->share('calificacion_general', CalificacionGeneral::orderBy('calificacion_general', 'asc')->pluck('calificacion_general', 'id_calificacion_general'));
        view()->share('tipo_vias', TipoVias::orderBy('tipo_vias', 'asc')->pluck('tipo_vias', 'id_tipo_vias'));
        // view()->share('', ::orderBy('', 'asc')->pluck('', ''));
        // view()->share('', ::orderBy('', 'asc')->pluck('', ''));
        // view()->share('usuarios', $this->todosLosUsuarios());
    }

    // ==========================================================================

    // public function todosLosUsuarios()
    // {
    //    try {

    //         $consulta_personas = DB::table('personas')
    //                         ->join('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'personas.id_tipo_documento')
    //                         ->join('rol', 'rol.id_rol', '=', 'personas.id_rol')
    //                         // ->join('municipios', 'municipios.id_municipio', '=', 'usuarios.id_municipio_nacimiento')
    //                         // ->join('municipios as residencia', 'residencia.id_municipio', '=', 'usuarios.id_municipio_residencia')
    //                         // ->leftJoin('niveles', 'niveles.id_nivel', '=', 'usuarios.id_nivel')
    //                         // ->leftJoin('tipo_ingles', 'tipo_ingles.id', '=', 'usuarios.id_tipo_ingles')
    //                         ->select('personas.nombre_usuario',
    //                                 'personas.nombres',
    //                                 'personas.apellidos',
    //                                 'tipo_documento.decripcion_documento',
    //                                 'personas.numero_documento',
    //                                 'personas.correo',
    //                                 'rol.nombre_rol',
    //                                 // 'usuarios.direccion_residencia',
    //                                 // 'roles.id_rol',
    //                                 //  'usuarios.fecha_nacimiento',
    //                                 //  'usuarios.genero', 'usuarios.estado',
    //                                 //  'usuarios.telefono', 'usuarios.celular',
    //                                 //  'usuarios.contacto2', 'usuarios.contacto_opcional',
    //                                 //  'usuarios.skype', 'usuarios.zoom',
    //                                 //  'usuarios.fecha_ingreso_sistema AS fecha_ingreso',
    //                                 //  'municipios.descripcion AS ciudad_nacimiento',
    //                                 //  'residencia.descripcion AS ciudad_residencia',
    //                                 //  'niveles.nivel_descripcion AS niveles',
    //                                 //  'niveles.id_nivel',
    //                                 //  'tipo_ingles.id AS id_tip_ing',
    //                                 //  'tipo_ingles.descripcion AS desc_tip_ing'
    //                                 )
    //                         // ->whereNull('usuarios.deleted_at')
    //                         // ->whereNull('tipo_documento.deleted_at')
    //                         // ->whereNull('municipios.deleted_at')
    //                         // ->whereNull('residencia.deleted_at')
    //                         // ->whereNull('roles.deleted_at')
    //                         // ->whereNull('niveles.deleted_at')
    //                         ->get()
    //                         ->toarray();

    //         // dd($consulta_personas);

    //         return $consulta_personas;

    //    }
    //    catch (Exception $e)
    //    {
    //        alert()->error('Error', 'An error has occurred, try again, if the problem persists contact support.');
    //        return back();
    //    }
    // }

    // public function tipos_documento()
    // {
    //     // $sesion = $this->validarVariablesSesion();

    //     // if(empty($sesion[0]) || is_null($sesion[0]) &&
    //     //    empty($sesion[1]) || is_null($sesion[1]) &&
    //     //    empty($sesion[2]) || is_null($sesion[2]) &&
    //     //    $sesion[2] != true)
    //     // {
    //     //     return redirect()->to(route('home'));
    //     // } else {
    //     //     $usuariosShow = new  UsuariosShow();
    //     //    return $usuariosShow->tiposDocumento();
    //     // }
    // }

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
