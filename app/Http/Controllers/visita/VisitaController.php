<?php

namespace App\Http\Controllers\visita;

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
use App\Models\TipoPersona;
use App\Models\ReferidoPor;
use App\Models\RedSocial;
use App\Models\DirigidoA;
use App\Models\Cliente;
use App\Models\Visita;
use App\Http\Responsable\visita\VisitaStore;
use App\Http\Responsable\visita\VisitaClienteUpdate;
use App\Http\Responsable\visita\VisitaTecnicaUpdate;
use App\Http\Responsable\visita\infoJuridicaUpdate;

class VisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // try {
        //     $sesion = $this->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) &&
        //         empty($sesion[3]) || is_null($sesion[3]) && $sesion[3] != true)
        //     {
        //         return redirect()->to(route('inicio'));
        //     } else {
                $todasVisitas = $this->visitasIndex();
                $this->shareData();
                return view('visita.index', compact('todasVisitas'));
        //     }
        // } catch (Exception $e) {
        //     // dd($e);
        //     alert()->error("Ha ocurrido un error!");
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($clienteId)
    {
        try {
            // $sesion = $this->validarVariablesSesion();

            // if (empty($sesion[0]) || is_null($sesion[0]) &&
            //     empty($sesion[1]) || is_null($sesion[1]) &&
            //     empty($sesion[2]) || is_null($sesion[2]) &&
            //     empty($sesion[3]) || is_null($sesion[3]) && $sesion[3] != true)
            // {
            //     return redirect()->to(route('inicio'));
            // } else {
                $crearVisitaCliente = $this->cliVisitaCreate($clienteId);
                $this->shareData();
                
                return view('visita.create',compact('crearVisitaCliente'));
        } catch (Exception $e) {
            alert()->error('Error', 'Error al consultar el cliente para crear la visita, por favor contacte a Soporte.');
            return back();
        }
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
        //     return new VisitaStore();
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
        // try {
        //     $sesion = $this->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) &&
        //         empty($sesion[3]) || is_null($sesion[3]) && $sesion[3] != true)
        //     {
        //         return redirect()->to(route('inicio'));
        //     } else {
                // $this->shareData();
                // return view('visita.edit');
        //     }
        // } catch (Exception $e) {
        //     // dd($e);
        //     alert()->error("Ha ocurrido un error!");
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idVisita)
    {
        // dd($idVisita);
        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
            $editarVisita = $this->editarVisita($idVisita);
            $this->shareData();
            return view('visita.edit', compact('editarVisita'));
        // }
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request, $id);

        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
            // return new VisitaUpdate();
        // }
    }

    //=========================================================

    public function visitaClienteUpdate(Request $request)
    {
        // dd($request, $id);

        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
            return new VisitaClienteUpdate();
        // }
    }

    //=========================================================

    public function visitaTecnicaUpdate(Request $request)
    {
        // dd($request, $id);

        // $sesion = $this->validarVariablesSesion();

        // if(empty($sesion[0]) || is_null($sesion[0]) &&
        //    empty($sesion[1]) || is_null($sesion[1]) &&
        //    empty($sesion[2]) || is_null($sesion[2]) &&
        //    $sesion[2] != true)
        // {
        //     return redirect()->to(route('home'));
        // } else {
            return new VisitaTecnicaUpdate();
        // }
    }

    //=========================================================

    public function infoJuridicaUpdate(Request $request)
    {
        // Si el usuario no esta autenticado, redireccionamos al login
        

        return new infoJuridicaUpdate();
    }

    //=========================================================

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
        view()->share('tipo_documento', TipoDocumento::orderBy('decripcion_documento', 'asc')->pluck('decripcion_documento', 'id_tipo_documento'));
        view()->share('tipo_persona', TipoPersona::orderBy('tipo_persona', 'asc')->pluck('tipo_persona', 'id_tipo_persona'));
        view()->share('dirigido_a', DirigidoA::orderBy('dirigido_a', 'asc')->pluck('dirigido_a', 'id_dirigido_a'));
        view()->share('referido_por', ReferidoPor::orderBy('referido_por', 'asc')->pluck('referido_por', 'id_referido_por'));
        view()->share('red_social', RedSocial::orderBy('red_social', 'asc')->pluck('red_social', 'id_red_social'));
        view()->share('avaluador', Usuario::orderBy('nombres', 'asc')->pluck('nombres', 'id_usuario'));
        view()->share('paises', Pais::orderBy('descripcion_pais', 'asc')->pluck('descripcion_pais', 'id_pais'));
        view()->share('departamentos', DepartamentoEstado::orderBy('descripcion_departamento', 'asc')->pluck('descripcion_departamento', 'id_departamento_estado'));
        view()->share('ciudades', Ciudad::orderBy('descripcion_ciudad', 'asc')->pluck('descripcion_ciudad', 'id_ciudad'));
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

    public function cliVisitaCreate($clienteId)
    {
        return DB::table('clientes')
                ->leftjoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                ->leftjoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'clientes.id_doc_cliente')
                ->leftjoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
                ->leftjoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
                ->select(   'id_cliente',
                            'cli_nombres',
                            'clientes.id_doc_cliente',
                            'decripcion_documento',
                            'documento_cliente',
                            'fecha_nacimiento',
                            'cli_celular',
                            'cli_email',
                            'clientes.id_tipo_persona',
                            'tipo_persona',
                            'referido_por',
                            'clientes.id_red_social',
                            'redes_sociales.red_social',
                            'clientes.nombre_quien_refiere',
                            'clientes.empresa_que_refiere'
                        )
                ->where('id_cliente', $clienteId)
                ->whereNull('clientes.deleted_at')
                ->first();
    }

    // ==========================================================================

    public function consultarEmpresa(Request $request)
    {
        $idEmpresa = request('id_dirigido_a', null);

        $consultarEmpresa = DB::table('dirigido_a')
                ->leftjoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'dirigido_a.id_tipo_documento')
                ->select('dirigido_a.id_tipo_documento',
                            'tipo_documento.decripcion_documento',
                            'dirigido_a.numero_documento'
                        )
                ->whereNull('dirigido_a.deleted_at')
                ->where('id_dirigido_a', $idEmpresa)
                ->first();

        return response()->json($consultarEmpresa);
    }

    // ==========================================================================

    public function visitasIndex()
    {
        return DB::table('visitas')
                    ->leftjoin('clientes','clientes.id_cliente','=','visitas.id_cliente')
                    ->leftjoin('dirigido_a','dirigido_a.id_dirigido_a','=','visitas.id_dirigido_a')
                    ->leftjoin('tipo_documento','tipo_documento.id_tipo_documento','=','visitas.id_doc_empresa')
                    ->leftjoin('pais','pais.id_pais','=','visitas.id_pais')
                    ->leftjoin('departamento_estado','departamento_estado.id_departamento_estado','=','visitas.id_departamento')
                    ->leftjoin('ciudad','ciudad.id_ciudad','=','visitas.id_ciudad')
                    ->leftjoin('tipo_inmueble','tipo_inmueble.id_tipo_inmueble','=','visitas.id_tipo_inmueble')
                    ->leftjoin('indicador_numerico as estrato','estrato.id_indicador_numerico','=','visitas.id_estrato')
                    ->leftjoin('indicador_numerico as parqueaderos','parqueaderos.id_indicador_numerico','=','visitas.id_cant_parqueaderos')
                    ->leftjoin('indicador_numerico as cuarto_util','cuarto_util.id_indicador_numerico','=','visitas.id_cant_cuarto_util')
                    ->leftjoin('indicador_numerico as kioskos','kioskos.id_indicador_numerico','=','visitas.id_cant_kioskos')
                    ->leftjoin('indicador_numerico as piscinas','piscinas.id_indicador_numerico','=','visitas.id_cant_piscinas')
                    ->leftjoin('indicador_numerico as establos','establos.id_indicador_numerico','=','visitas.id_cant_establos')
                    ->leftjoin('indicador_numerico as billares','billares.id_indicador_numerico','=','visitas.id_cant_billares')
                    ->leftjoin('si_no','si_no.id_si_no','=','visitas.id_visitado')
                    ->leftjoin('usuarios','usuarios.id_usuario','=','visitas.id_visitador')
                    ->select(
                        'visitas.id_cliente',
                        'visitas.id_visita',
                        'clientes.cli_nombres',
                        'dirigido_a.dirigido_a',
                        'visitas.objeto_avaluo',
                        'descripcion_ciudad',
                        'tipo_inmueble.tipo_inmueble',
                        'visitas.area',
                        'estrato.indicador_numerico as estrato',
                        'visitas.porcentaje_descuento',
                        'visitas.valor_cotizacion',
                        'descripcion_si_no'
                    )
                    ->whereNull('visitas.deleted_at')
                    ->whereNull('clientes.deleted_at')
                    ->get()
                    ->toArray();
    }

    // ==========================================================================

    public function editarVisita($idVisita)
    {
        return DB::table('visitas')
                    ->leftjoin('clientes','clientes.id_cliente','=','visitas.id_cliente')
                    ->leftjoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                    ->leftjoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
                    ->leftjoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
                    ->leftjoin('dirigido_a','dirigido_a.id_dirigido_a','=','visitas.id_dirigido_a')
                    ->leftjoin('tipo_documento as id_tdoc_cliente','id_tdoc_cliente.id_tipo_documento','=','clientes.id_doc_cliente')
                    ->leftjoin('tipo_documento as id_tdoc_empresa','id_tdoc_empresa.id_tipo_documento','=','visitas.id_doc_empresa')
                    ->leftjoin('pais','pais.id_pais','=','visitas.id_pais')
                    ->leftjoin('departamento_estado','departamento_estado.id_departamento_estado','=','visitas.id_departamento')
                    ->leftjoin('ciudad','ciudad.id_ciudad','=','visitas.id_ciudad')
                    ->leftjoin('tipo_inmueble','tipo_inmueble.id_tipo_inmueble','=','visitas.id_tipo_inmueble')
                    ->leftjoin('indicador_numerico as estrato','estrato.id_indicador_numerico','=','visitas.id_estrato')
                    ->leftjoin('indicador_numerico as parqueaderos','parqueaderos.id_indicador_numerico','=','visitas.id_cant_parqueaderos')
                    ->leftjoin('indicador_numerico as cuarto_util','cuarto_util.id_indicador_numerico','=','visitas.id_cant_cuarto_util')
                    ->leftjoin('indicador_numerico as kioskos','kioskos.id_indicador_numerico','=','visitas.id_cant_kioskos')
                    ->leftjoin('indicador_numerico as piscinas','piscinas.id_indicador_numerico','=','visitas.id_cant_piscinas')
                    ->leftjoin('indicador_numerico as establos','establos.id_indicador_numerico','=','visitas.id_cant_establos')
                    ->leftjoin('indicador_numerico as billares','billares.id_indicador_numerico','=','visitas.id_cant_billares')
                    ->leftjoin('si_no','si_no.id_si_no','=','visitas.id_visitado')
                    ->leftjoin('usuarios','usuarios.id_usuario','=','visitas.id_visitador')
                    ->select(
                        'visitas.id_visita',
                        'clientes.id_cliente',
                        'cli_nombres',
                        'clientes.id_doc_cliente',
                        'id_tdoc_cliente.decripcion_documento as cli_tipo_doc',
                        'documento_cliente',
                        'fecha_nacimiento',
                        'cli_celular',
                        'cli_email',
                        'clientes.id_tipo_persona',
                        'tipo_persona',
                        'referido_por',
                        'clientes.id_red_social',
                        'redes_sociales.red_social',
                        'clientes.nombre_quien_refiere',
                        'clientes.empresa_que_refiere',
                        'dirigido_a.id_dirigido_a',
                        'dirigido_a.dirigido_a',
                        'visitas.id_doc_empresa',
                        'id_tdoc_empresa.decripcion_documento as empresa_tipo_doc',
                        'visitas.documento_empresa',
                        'visitas.objeto_avaluo',
                        'descripcion_ciudad',
                        'descripcion_pais',
                        'descripcion_departamento',
                        'descripcion_ciudad',
                        'visitas.sector',
                        'visitas.cerca_de',
                        'visitas.barrio',
                        'visitas.unidad_edificio',
                        'visitas.direccion',
                        'tipo_inmueble.id_tipo_inmueble',
                        'tipo_inmueble.tipo_inmueble',
                        'visitas.area',
                        'estrato.indicador_numerico as estrato',
                        'visitas.numero_inmueble',
                        'parqueaderos.indicador_numerico as parqueaderos',
                        'cuarto_util.indicador_numerico as cuarto_util',
                        'kioskos.indicador_numerico as kioskos',
                        'piscinas.indicador_numerico as piscinas',
                        'establos.indicador_numerico as establos',
                        'billares.indicador_numerico as billares',
                        'visitas.porcentaje_descuento',
                        'visitas.valor_cotizacion',
                        'visitas.latitud',
                        'visitas.longitud',
                        'visitas.obser_visita',
                        'descripcion_si_no',
                        'visitas.fecha_visita',
                        'visitas.hora_visita',
                        'visitas.id_visitador',
                        DB::raw("CONCAT(nombres, ' ', apellidos) AS nombres_visitador")
                    )
                    ->where('visitas.id_visita', $idVisita)
                    ->whereNull('visitas.deleted_at')
                    ->whereNull('clientes.deleted_at')
                    ->first();
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
}
