<?php

namespace App\Http\Controllers\avaluo;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\admin\AdministradorController;
use App\Http\Responsable\avaluo\AvaluoClienteUpdate;
use App\Http\Responsable\avaluo\AvaluoTecnicaUpdate;
use App\Http\Responsable\avaluo\AvaluoInfoJuridicaUpdate;
use App\Http\Responsable\avaluo\AvaluoInfoInmuebleUpdate;
use App\Http\Responsable\avaluo\AvaluoCaracteristicasInmuebleUpdate;
use App\Http\Responsable\avaluo\AvaluoAcabadosInmuebleUpdate;
use App\Http\Responsable\avaluo\AvaluoCalificacionInmuebleUpdate;
use App\Http\Responsable\avaluo\AvaluoDotacionComunalUpdate;
use App\Http\Responsable\avaluo\AvaluoInfoSectorUpdate;
use App\Http\Responsable\avaluo\AvaluoCondiUrbanisticasUpdate;
use App\Http\Responsable\avaluo\AvaluoObserGeneralesUpdate;
use App\Http\Responsable\avaluo\AvaluoRegFotograficoUpdate;
use App\Http\Responsable\avaluo\AvaluoValorEstimadoUpdate;
use App\Http\Responsable\avaluo\AvaluoEstadoConservacionUpdate;
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
use App\Models\TipoPiso;
use App\Models\TipoBanio;
use App\Models\TipoCocina;
use App\Models\TipoMeson;
use App\Models\Comuna;
use App\Models\FactorCalidad;
use App\Models\FactorZona;
use App\Models\FactorTiempo;
use App\Models\FactorPendiente;
use App\Models\FactorUbicacion;
use App\Models\EstadoConservacionOpciones;
use App\Http\Responsable\visita\VisitaStore;
use App\Http\Responsable\visita\VisitaClienteUpdate;
use App\Http\Responsable\visita\VisitaTecnicaUpdate;
use App\Http\Responsable\visita\VisitaInfoJuridicaUpdate;
use App\Http\Responsable\visita\VisitaInfoInmuebleUpdate;
use App\Http\Responsable\visita\VisitaCaracteristicasInmuebleUpdate;
use App\Http\Responsable\visita\VisitaAcabadosInmuebleUpdate;
use App\Http\Responsable\visita\VisitaCalificacionInmuebleUpdate;
use App\Http\Responsable\visita\VisitaDotacionComunalUpdate;
use App\Http\Responsable\visita\VisitaInfoSectorUpdate;
use App\Http\Responsable\visita\VisitaCondiUrbanisticasUpdate;
use App\Http\Responsable\visita\VisitaObserGeneralesUpdate;
use App\Http\Responsable\visita\VisitaRegFotograficoUpdate;
use App\Http\Responsable\visita\VisitaValorEstimadoUpdate;
use App\Http\Responsable\visita\VisitaEstadoConservacionUpdate;

class AvaluoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitas = Visita::all();

        if (isset($visitas) && !is_null($visitas) && !empty($visitas)) {
            return response()->json($visitas);
        } else {
            return response()->json([
                'message' => 'no hay visitas'
            ], 404);
        }
    }

    // =================================================================
    // =================================================================

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idVisita)
    {

    }

    // =================================================================
    // =================================================================

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    // =================================================================
    // =================================================================

    /**
     * Display the specified resource.
     *
     * @param  int  $idVisita
     * @param  \App\Models\Visita $visita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visita = Visita::find($id);

        if (isset($visita) && !is_null($visita) && !empty($visita)) {
            return response()->json($visita);
        } else {
            abort(404,$message="no existe esta visita");
        }
    }

    // =================================================================
    // =================================================================

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idVisita)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         $calcularAvaluo = $this->calcularAvaluo($idVisita);
        //         $calcularAvaluo2 = $this->calcularAvaluo2($idVisita);
        //         $this->shareData();
        //         return view('avaluo.edit', compact('calcularAvaluo', 'calcularAvaluo2'));
        //     }
        // } catch (Exception $e) {
        //     dd($e);
        //     alert()->error("Error Exception!");
        //     return back();
        // }
    }

    // =================================================================
    // =================================================================

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    // =================================================================
    // =================================================================

    public function avaluoClienteUpdate(Request $request)
    {
        try {

            $datos = $request->json();

            dd($request);

            if(is_object($datos) && !empty($datos) && !is_null($datos) && count($datos) > 0)
            {
                $avaluo = new AvaluoClienteUpdate();
                return $avaluo->toResponse($request);

            } else {
                return $this->errorResponse(['respuesta' => 'Datos Invalidos o Vacios'], 401);
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    //=========================================================
    //=========================================================

    public function visitaTecnicaUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaTecnicaUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    public function visitaInfoJuridicaUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaInfoJuridicaUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    public function visitaInfoInmuebleUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaInfoInmuebleUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    public function visitaCaracteristicasInmuebleUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaCaracteristicasInmuebleUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    public function visitaAcabadosInmuebleUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaAcabadosInmuebleUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    public function visitaCalificacionInmuebleUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaCalificacionInmuebleUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    public function visitaDotacionComunalUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaDotacionComunalUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    public function visitaInfoSectorUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaInfoSectorUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    public function visitaCondiUrbanisticasUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaCondiUrbanisticasUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    public function visitaObserGeneralesUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaObserGeneralesUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    public function visitaRegFotograficoUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaRegFotograficoUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    public function visitaValorEstimadoUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaValorEstimadoUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    public function visitaEstadoConservacionUpdate(Request $request)
    {
        // try {
        //     $adminCtrl = new AdministradorController();
        //     $sesion = $adminCtrl->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return view('inicio_sesion.login');
        //     } else {
        //         return new VisitaEstadoConservacionUpdate();
        //     }
        // } catch (Exception $e) {
        //     alert()->error("Ha ocurrido un error!");
        //     return back();
        // }
    }

    //=========================================================
    //=========================================================

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    //=========================================================
    //=========================================================



    //=========================================================
    //=========================================================

    // public function cliVisitaAvaluo($idVisita)
    // {
    //     return DB::table('clientes')
    //             ->leftjoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
    //             ->leftjoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'clientes.id_doc_cliente')
    //             ->leftjoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
    //             ->leftjoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
    //             ->select(   'id_cliente',
    //                         'cli_nombres',
    //                         'clientes.id_doc_cliente',
    //                         'decripcion_documento as cli_tipo_doc',
    //                         'documento_cliente',
    //                         'fecha_nacimiento',
    //                         'cli_celular',
    //                         'cli_email',
    //                         'clientes.id_tipo_persona',
    //                         'tipo_persona',
    //                         'clientes.id_referido_por',
    //                         'referido_por',
    //                         'clientes.id_red_social',
    //                         'redes_sociales.red_social',
    //                         'clientes.nombre_quien_refiere',
    //                         'clientes.empresa_que_refiere'
    //                     )
    //             ->where('id_cliente', $idVisita)
    //             ->whereNull('clientes.deleted_at')
    //             ->first();
    // }

    //=========================================================
    //=========================================================

    // public function consultarEmpresa(Request $request)
    // {
    //     $idEmpresa = request('id_dirigido_a', null);

    //     $consultarEmpresa = DB::table('dirigido_a')
    //             ->leftjoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'dirigido_a.id_tipo_documento')
    //             ->select('dirigido_a.id_tipo_documento',
    //                         'tipo_documento.decripcion_documento',
    //                         'dirigido_a.numero_documento'
    //                     )
    //             ->whereNull('dirigido_a.deleted_at')
    //             ->where('id_dirigido_a', $idEmpresa)
    //             ->first();

    //     return response()->json($consultarEmpresa);
    // }

    //=========================================================
    //=========================================================

    // public function avaluosIndex()
    // {
    //     return DB::table('visitas')
    //                 ->leftjoin('avaluo','avaluo.id_visita','=','visitas.id_visita')
    //                 ->leftjoin('clientes','clientes.id_cliente','=','visitas.id_cliente')
    //                 ->leftjoin('dirigido_a','dirigido_a.id_dirigido_a','=','visitas.id_dirigido_a')
    //                 ->leftjoin('tipo_documento','tipo_documento.id_tipo_documento','=','visitas.id_doc_empresa')
    //                 ->leftjoin('pais','pais.id_pais','=','visitas.id_pais')
    //                 ->leftjoin('departamento_estado','departamento_estado.id_departamento_estado','=','visitas.id_departamento')
    //                 ->leftjoin('ciudad','ciudad.id_ciudad','=','visitas.id_ciudad')
    //                 ->leftjoin('tipo_inmueble','tipo_inmueble.id_tipo_inmueble','=','visitas.id_tipo_inmueble')
    //                 ->leftjoin('indicador_numerico as estrato','estrato.id_indicador_numerico','=','visitas.id_estrato')
    //                 ->leftjoin('si_no','si_no.id_si_no','=','visitas.id_visitado')
    //                 ->leftjoin('usuarios','usuarios.id_usuario','=','visitas.id_visitador')
    //                 ->select(
    //                     'avaluo.id_avaluo',
    //                     'visitas.id_cliente',
    //                     'visitas.id_visita',
    //                     'clientes.cli_nombres',
    //                     'dirigido_a.dirigido_a',
    //                     'visitas.objeto_avaluo',
    //                     'descripcion_ciudad',
    //                     'tipo_inmueble.tipo_inmueble',
    //                     'visitas.area',
    //                     'estrato.indicador_numerico as estrato',
    //                     'visitas.porcentaje_descuento',
    //                     'visitas.valor_cotizacion',
    //                     'descripcion_si_no',
    //                     'fecha_visita',
    //                     DB::raw('DATE_FORMAT(FROM_UNIXTIME(fecha_visita), "%d-%m-%Y") as fecha_visita'),
    //                     DB::raw('DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(fecha_visita), INTERVAL 3 DAY), "%d-%m-%Y") as fecha_informe'),
    //                 )
    //                 ->whereNull('visitas.deleted_at')
    //                 ->whereNull('clientes.deleted_at')
    //                 ->where('visitas.id_visitado',1)
    //                 ->orderBy('visitas.id_visita', 'DESC')
    //                 ->get()
    //                 ->toArray();
    // }

    //=========================================================
    //=========================================================

    // public function calcularAvaluo($idVisita)
    // {
    //     $visitas = Visita::with('usuario', 'cargo')->first();
    //     dd($visitas);

    //     return DB::table('visitas')
    //                 // ->leftjoin('avaluo','avaluo.id_visita','=','visitas.id_visita')
    //                 ->leftjoin('clientes','clientes.id_cliente','=','visitas.id_cliente')
    //                 ->leftjoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
    //                 ->leftjoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
    //                 ->leftjoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
    //                 ->leftjoin('dirigido_a','dirigido_a.id_dirigido_a','=','visitas.id_dirigido_a')
    //                 ->leftjoin('tipo_documento as id_tdoc_cliente','id_tdoc_cliente.id_tipo_documento','=','clientes.id_doc_cliente')
    //                 ->leftjoin('tipo_documento as id_tdoc_empresa','id_tdoc_empresa.id_tipo_documento','=','visitas.id_doc_empresa')
    //                 ->leftjoin('pais as cliente_pais','cliente_pais.id_pais','=','clientes.id_pais')
    //                 ->leftjoin('pais as visita_pais','visita_pais.id_pais','=','visitas.id_pais')
    //                 ->leftjoin('departamento_estado as cliente_dpto','cliente_dpto.id_departamento_estado','=','clientes.id_dpto_estado')
    //                 ->leftjoin('departamento_estado as visita_dpto','visita_dpto.id_departamento_estado','=','visitas.id_departamento')
    //                 ->leftjoin('ciudad as cliente_ciudad','cliente_ciudad.id_ciudad','=','clientes.id_ciudad')
    //                 ->leftjoin('ciudad as visita_ciudad','visita_ciudad.id_ciudad','=','visitas.id_ciudad')
    //                 ->leftjoin('tipo_inmueble','tipo_inmueble.id_tipo_inmueble','=','visitas.id_tipo_inmueble')
    //                 ->leftjoin('indicador_numerico as estrato','estrato.id_indicador_numerico','=','visitas.id_estrato')
    //                 ->leftjoin('si_no','si_no.id_si_no','=','visitas.id_visitado')
    //                 ->leftjoin('usuarios','usuarios.id_usuario','=','visitas.id_visitador')
    //                 ->leftjoin('info_inmueble','info_inmueble.id_visita','=','visitas.id_visita')
    //                 ->leftjoin('tipo_vivienda','tipo_vivienda.id_tipo_vivienda','=','info_inmueble.id_tipo_vivienda')
    //                 ->leftjoin('uso_inmueble','uso_inmueble.id_uso_inmueble','=','info_inmueble.id_uso_inmueble')
    //                 ->leftjoin('tipo_suelo','tipo_suelo.id_tipo_suelo','=','info_inmueble.id_tipo_suelo')
    //                 ->leftjoin('topografia','topografia.id_topografia','=','info_inmueble.id_topografia')
    //                 ->leftjoin('forma','forma.id_forma','=','info_inmueble.id_forma')
    //                 ->leftjoin('indicador_numerico as pisos_inmueble','pisos_inmueble.id_indicador_numerico','=','info_inmueble.pisos_inmueble')
    //                 ->leftjoin('indicador_numerico as pisos_edificio','pisos_edificio.id_indicador_numerico','=','info_inmueble.pisos_edificio')
    //                 ->leftjoin('si_no as remodelado','remodelado.id_si_no','=','info_inmueble.remodelado')
    //                 ->leftjoin('condicion_inmueble','condicion_inmueble.id_condicion_inmueble','=','info_inmueble.id_condicion_inmueble')
    //                 ->leftjoin('caracteristicas_inmueble','caracteristicas_inmueble.id_visita','=','visitas.id_visita')
    //                 ->leftjoin('indicador_numerico as cocinas','cocinas.id_indicador_numerico','=','caracteristicas_inmueble.cocinas')
    //                 ->leftjoin('indicador_numerico as habitaciones','habitaciones.id_indicador_numerico','=','caracteristicas_inmueble.habitaciones')
    //                 ->leftjoin('indicador_numerico as salas','salas.id_indicador_numerico','=','caracteristicas_inmueble.salas')
    //                 ->leftjoin('indicador_numerico as habitaciones_servicio','habitaciones_servicio.id_indicador_numerico','=','caracteristicas_inmueble.habitaciones_servicio')
    //                 ->leftjoin('indicador_numerico as comedores','comedores.id_indicador_numerico','=','caracteristicas_inmueble.comedores')
    //                 ->leftjoin('indicador_numerico as banios_servicio','banios_servicio.id_indicador_numerico','=','caracteristicas_inmueble.banios_servicio')
    //                 ->leftjoin('indicador_numerico as banios_social','banios_social.id_indicador_numerico','=','caracteristicas_inmueble.banios_social')
    //                 ->leftjoin('indicador_numerico as banios_privado','banios_privado.id_indicador_numerico','=','caracteristicas_inmueble.banios_privado')
    //                 ->leftjoin('indicador_numerico as balcones','balcones.id_indicador_numerico','=','caracteristicas_inmueble.balcones')
    //                 ->leftjoin('indicador_numerico as zona_ropa','zona_ropa.id_indicador_numerico','=','caracteristicas_inmueble.zona_ropa')
    //                 ->leftjoin('indicador_numerico as estudios','estudios.id_indicador_numerico','=','caracteristicas_inmueble.estudios')
    //                 ->leftjoin('indicador_numerico as patios','patios.id_indicador_numerico','=','caracteristicas_inmueble.patios')
    //                 ->leftjoin('indicador_numerico as vestier','vestier.id_indicador_numerico','=','caracteristicas_inmueble.vestier')
    //                 ->leftjoin('indicador_numerico as escala_emergencia','escala_emergencia.id_indicador_numerico','=','caracteristicas_inmueble.escala_emergencia')
    //                 ->leftjoin('indicador_numerico as closets','closets.id_indicador_numerico','=','caracteristicas_inmueble.closets')
    //                 ->leftjoin('indicador_numerico as shut_basura','shut_basura.id_indicador_numerico','=','caracteristicas_inmueble.shut_basura')
    //                 ->leftjoin('indicador_numerico as parqueaderos','parqueaderos.id_indicador_numerico','=','caracteristicas_inmueble.cant_parqueaderos')
    //                 ->leftjoin('indicador_numerico as cuarto_util','cuarto_util.id_indicador_numerico','=','caracteristicas_inmueble.cant_cuarto_util')
    //                 ->leftjoin('indicador_numerico as kioskos','kioskos.id_indicador_numerico','=','caracteristicas_inmueble.cant_kioskos')
    //                 ->leftjoin('indicador_numerico as piscinas','piscinas.id_indicador_numerico','=','caracteristicas_inmueble.cant_piscinas')
    //                 ->leftjoin('indicador_numerico as establos','establos.id_indicador_numerico','=','caracteristicas_inmueble.cant_establos')
    //                 ->leftjoin('indicador_numerico as billares','billares.id_indicador_numerico','=','caracteristicas_inmueble.cant_billares')
    //                 ->leftjoin('indicador_numerico as ascensores','ascensores.id_indicador_numerico','=','caracteristicas_inmueble.cant_ascensores')
    //                 ->leftjoin('acabados_inmueble','acabados_inmueble.id_visita','=','visitas.id_visita')
    //                 ->leftjoin('calificacion_inmueble','calificacion_inmueble.id_visita','=','visitas.id_visita')
    //                 ->leftjoin('dotacion_comunal','dotacion_comunal.id_visita','=','visitas.id_visita')
    //                 ->leftjoin('condiciones_urbanisticas','condiciones_urbanisticas.id_visita','=','visitas.id_visita')
    //                 ->leftjoin('info_sector','info_sector.id_visita','=','visitas.id_visita')
    //                 ->leftjoin('observaciones_generales','observaciones_generales.id_visita','=','visitas.id_visita')
    //                 ->leftjoin('valor_estimado_avaluo','valor_estimado_avaluo.id_visita','=','visitas.id_visita')
    //                 ->leftjoin('estado_conservacion','estado_conservacion.id_visita','=','visitas.id_visita')
    //                 ->leftjoin('registro_fotografico','registro_fotografico.id_visita','=','visitas.id_visita')
    //                 ->select(
    //                     'visitas.id_visita',
    //                     'clientes.id_cliente',
    //                     'cli_nombres',
    //                     'clientes.id_doc_cliente',
    //                     'id_tdoc_cliente.decripcion_documento as cli_tipo_doc',
    //                     'documento_cliente',
    //                     'fecha_nacimiento',
    //                     'cli_celular',
    //                     'cli_email',
    //                     'clientes.id_tipo_persona',
    //                     'tipo_persona',
    //                     'cliente_pais.id_pais as cli_pais',
    //                     'cliente_dpto.id_departamento_estado as cli_dpto',
    //                     'cliente_ciudad.id_ciudad as cli_ciudad',
    //                     'clientes.id_referido_por',
    //                     'referido_por',
    //                     'clientes.id_red_social',
    //                     'redes_sociales.red_social',
    //                     'clientes.nombre_quien_refiere',
    //                     'clientes.empresa_que_refiere',
    //                     'dirigido_a.id_dirigido_a',
    //                     'dirigido_a.dirigido_a',
    //                     'visitas.id_doc_empresa',
    //                     'id_tdoc_empresa.decripcion_documento as empresa_tipo_doc',
    //                     'visitas.documento_empresa',
    //                     'visitas.objeto_avaluo',
    //                     'visita_pais.id_pais as visita_pais',
    //                     'visita_pais.descripcion_pais',
    //                     'visita_dpto.id_departamento_estado as id_vis_dpto',
    //                     'visita_dpto.descripcion_departamento as vis_dpto',
    //                     'visita_ciudad.id_ciudad as vis_ciudad',
	//                     'visita_ciudad.descripcion_ciudad',
	//                     'visitas.id_comuna',
    //                     'visitas.sector',
    //                     'visitas.cerca_de',
    //                     'visitas.barrio',
    //                     'visitas.unidad_edificio',
    //                     'visitas.direccion',
    //                     'tipo_inmueble.id_tipo_inmueble',
    //                     'tipo_inmueble.tipo_inmueble',
    //                     'visitas.area',
    //                     'estrato.id_indicador_numerico as estrato',
    //                     'visitas.numero_inmueble',
    //                     'visitas.porcentaje_descuento',
    //                     'visitas.valor_cotizacion',
    //                     'visitas.latitud',
    //                     'visitas.longitud',
    //                     'visitas.obser_visita',
    //                     'visitas.id_visitado',
    //                     'visitas.fecha_visita',
    //                     'visitas.hora_visita',
    //                     'visitas.id_visitador',
    //                     DB::raw("CONCAT(nombres, ' ', apellidos) AS nombres_visitador"),
    //                     'info_inmueble.pisos_inmueble',
    //                     'info_inmueble.pisos_edificio',
    //                     'info_inmueble.id_tipo_vivienda',
    //                     'info_inmueble.id_uso_inmueble',
    //                     'info_inmueble.id_tipo_suelo',
    //                     'info_inmueble.id_topografia',
    //                     'info_inmueble.id_forma',
    //                     'info_inmueble.pisos_inmueble',
    //                     'info_inmueble.pisos_edificio',
    //                     'info_inmueble.valor_administracion',
    //                     'info_inmueble.altura',
    //                     'info_inmueble.frente',
    //                     'info_inmueble.fondo',
    //                     'info_inmueble.remodelado',
    //                     'info_inmueble.area_libre',
    //                     'info_inmueble.anios_remodelacion',
    //                     'info_inmueble.area_patios',
    //                     'info_inmueble.id_condicion_inmueble',
    //                     'info_inmueble.obs_info_inmueble',
    //                     'caracteristicas_inmueble.cocinas',
    //                     'caracteristicas_inmueble.habitaciones',
    //                     'caracteristicas_inmueble.salas',
    //                     'caracteristicas_inmueble.habitaciones_servicio',
    //                     'caracteristicas_inmueble.comedores',
    //                     'caracteristicas_inmueble.banios_servicio',
    //                     'caracteristicas_inmueble.banios_social',
    //                     'caracteristicas_inmueble.banios_privado',
    //                     'caracteristicas_inmueble.balcones',
    //                     'caracteristicas_inmueble.zona_ropa',
    //                     'caracteristicas_inmueble.estudios',
    //                     'caracteristicas_inmueble.patios',
    //                     'caracteristicas_inmueble.vestier',
    //                     'caracteristicas_inmueble.escala_emergencia',
    //                     'caracteristicas_inmueble.closets',
    //                     'caracteristicas_inmueble.shut_basura',
    //                     'caracteristicas_inmueble.cant_parqueaderos',
    //                     'caracteristicas_inmueble.cant_cuarto_util',
    //                     'caracteristicas_inmueble.cant_kioskos',
    //                     'caracteristicas_inmueble.cant_piscinas',
    //                     'caracteristicas_inmueble.cant_establos',
    //                     'caracteristicas_inmueble.cant_billares',
    //                     'caracteristicas_inmueble.cant_ascensores',
    //                     'caracteristicas_inmueble.obs_caract_inmueble',
    //                     'acabados_inmueble.id_sistema_constructivo',
    //                     'acabados_inmueble.porton_principal',
    //                     'acabados_inmueble.id_tipo_fachada',
    //                     'acabados_inmueble.puertas',
    //                     'acabados_inmueble.id_tipo_muro',
    //                     'acabados_inmueble.id_ventaneria',
    //                     'acabados_inmueble.id_tipo_techo',
    //                     'acabados_inmueble.servicios_publicos',
    //                     'acabados_inmueble.pisos',
    //                     'acabados_inmueble.telefono',
    //                     'acabados_inmueble.banios',
    //                     'acabados_inmueble.energia',
    //                     'acabados_inmueble.cocina',
    //                     'acabados_inmueble.agua',
    //                     'acabados_inmueble.meson',
    //                     'acabados_inmueble.gas',
    //                     'acabados_inmueble.patios',
    //                     'acabados_inmueble.obs_acabados_inmueble',
    //                     'calificacion_inmueble.cal_estructura',
    //                     'calificacion_inmueble.cal_porton_ppal',
    //                     'calificacion_inmueble.cal_fachada',
    //                     'calificacion_inmueble.cal_puertas',
    //                     'calificacion_inmueble.cal_muros',
    //                     'calificacion_inmueble.cal_ventaneria',
    //                     'calificacion_inmueble.cal_techos',
    //                     'calificacion_inmueble.cal_carpinteria',
    //                     'calificacion_inmueble.cal_pisos',
    //                     'calificacion_inmueble.cal_ventilacion',
    //                     'calificacion_inmueble.cal_cocina',
    //                     'calificacion_inmueble.cal_iluminacion',
    //                     'calificacion_inmueble.cal_banios',
    //                     'calificacion_inmueble.cal_distribucion',
    //                     'calificacion_inmueble.cal_zona_ropas',
    //                     'calificacion_inmueble.cal_humedades',
    //                     'calificacion_inmueble.cal_patios',
    //                     'calificacion_inmueble.obs_calificacion_inmueble',
    //                     'dotacion_comunal.porteria_24',
    //                     'dotacion_comunal.parqueo_comun',
    //                     'dotacion_comunal.juegos_infantiles',
    //                     'dotacion_comunal.zona_mascotas',
    //                     'dotacion_comunal.piscinas',
    //                     'dotacion_comunal.zonas_verdes',
    //                     'dotacion_comunal.sauna',
    //                     'dotacion_comunal.salon_social',
    //                     'dotacion_comunal.turco',
    //                     'dotacion_comunal.canchas',
    //                     'dotacion_comunal.gimnasio',
    //                     'dotacion_comunal.playground',
    //                     'dotacion_comunal.barbecue',
    //                     'dotacion_comunal.supermercado',
    //                     'dotacion_comunal.sala_cine',
    //                     'dotacion_comunal.cafeteria',
    //                     'dotacion_comunal.restaurante',
    //                     'dotacion_comunal.squash',
    //                     'dotacion_comunal.obs_dotacion_comunal',
    //                     'condiciones_urbanisticas.id_valorizacion',
    //                     'condiciones_urbanisticas.cu_alumbrado_publico',
    //                     'condiciones_urbanisticas.cu_transporte',
    //                     'condiciones_urbanisticas.cu_orden_publico',
    //                     'condiciones_urbanisticas.cu_seguridad',
    //                     'condiciones_urbanisticas.cu_salubridad',
    //                     'condiciones_urbanisticas.cu_vias',
    //                     'condiciones_urbanisticas.id_tipo_vias',
    //                     'condiciones_urbanisticas.cu_aceras',
    //                     'condiciones_urbanisticas.cu_red_gas',
    //                     'condiciones_urbanisticas.cu_red_telco',
    //                     'condiciones_urbanisticas.cu_red_acueducto',
    //                     'condiciones_urbanisticas.cu_red_alcantarillado',
    //                     'condiciones_urbanisticas.cu_barrios_sectores',
    //                     'condiciones_urbanisticas.cu_tipo_edificaciones',
    //                     'condiciones_urbanisticas.obs_condiciones_urbanisticas',
    //                     'info_sector.barrios_sectores',
    //                     'info_sector.actividad_predominante',
    //                     'info_sector.transporte',
    //                     'info_sector.vias_acceso',
    //                     'observaciones_generales.observaciones_generales',
    //                     'valor_estimado_avaluo.valor_estimado_inmueble',
    //                     'estado_conservacion.id_factor_calidad',
    //                     'estado_conservacion.id_factor_zona',
    //                     'estado_conservacion.id_factor_tiempo',
    //                     'estado_conservacion.id_factor_pendiente',
    //                     'estado_conservacion.valor_pendiente',
    //                     'estado_conservacion.id_factor_ubicacion',
    //                     'estado_conservacion.valor_ubicacion',
    //                     'estado_conservacion.id_estado_conservacion_opciones',
    //                     'registro_fotografico.rf_fachada',
    //                     'registro_fotografico.rf_entrada',
    //                     'registro_fotografico.rf_sala1',
    //                     'registro_fotografico.rf_sala2',
    //                     'registro_fotografico.rf_sala3',
    //                     'registro_fotografico.rf_comedor1',
    //                     'registro_fotografico.rf_comedor2',
    //                     'registro_fotografico.rf_comedor3',
    //                     'registro_fotografico.rf_cocina1',
    //                     'registro_fotografico.rf_cocina2',
    //                     'registro_fotografico.rf_cocina3',
    //                     'registro_fotografico.rf_habitacion1',
    //                     'registro_fotografico.rf_habitacion2',
    //                     'registro_fotografico.rf_habitacion3',
    //                     'registro_fotografico.rf_habitacion4',
    //                     'registro_fotografico.rf_habitacion5',
    //                     'registro_fotografico.rf_habitacion6',
    //                     'registro_fotografico.rf_habitacion7',
    //                     'registro_fotografico.rf_bano1',
    //                     'registro_fotografico.rf_bano2',
    //                     'registro_fotografico.rf_bano3',
    //                     'registro_fotografico.rf_patio1',
    //                     'registro_fotografico.rf_patio2',
    //                     'registro_fotografico.rf_patio3',
    //                     'registro_fotografico.rf_estudio1',
    //                     'registro_fotografico.rf_estudio2',
    //                     'registro_fotografico.rf_estudio3',
    //                     'registro_fotografico.rf_cuarto_util1',
    //                     'registro_fotografico.rf_cuarto_util2',
    //                     'registro_fotografico.rf_cuarto_util3',
    //                     'registro_fotografico.rf_pasillo1',
    //                     'registro_fotografico.rf_pasillo2',
    //                     'registro_fotografico.rf_pasillo3',
    //                     'registro_fotografico.rf_zona_ropa1',
    //                     'registro_fotografico.rf_zona_ropa2',
    //                     'registro_fotografico.rf_zona_ropa3',
    //                     'registro_fotografico.rf_balcon1',
    //                     'registro_fotografico.rf_balcon2',
    //                     'registro_fotografico.rf_balcon3',
    //                 )
    //                 ->where('visitas.id_visita', $idVisita)
    //                 ->whereNull('visitas.deleted_at')
    //                 ->whereNull('clientes.deleted_at')
    //                 ->first();
    // }

    //=========================================================
    //=========================================================

    // public function calcularAvaluo2($idVisita)
    // {
    //     return DB::table('visitas')
    //                 ->leftjoin('avaluo','avaluo.id_visita','=','visitas.id_visita')
    //                 ->select(
    //                     'avaluo.id_avaluo',
    //                 )
    //                 ->where('visitas.id_visita', $idVisita)
    //                 ->whereNull('visitas.deleted_at')
    //                 ->whereNull('clientes.deleted_at')
    //                 ->first();
    // }

    //=========================================================

    // public function consultarFactorPendiente()
    // {
    //     $id_factor_pendiente = request('id_factor_pendiente', null);

    //     return FactorPendiente::select('valor_pendiente')
    //                             ->where('id_factor_pendiente', $id_factor_pendiente)
    //                             ->first();
    // }

    //=========================================================

    // public function consultarFactorUbicacion()
    // {
    //     $id_factor_ubicacion = request('id_factor_ubicacion', null);

    //     return FactorUbicacion::select('valor_ubicacion')
    //                             ->where('id_factor_ubicacion', $id_factor_ubicacion)
    //                             ->first();
    // }
}
