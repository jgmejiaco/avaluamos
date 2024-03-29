<?php

namespace App\Http\Controllers\avaluo;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\admin\AdministradorController;
use App\Models\Usuario;
use App\Models\TipoDocumento;
use App\Models\Ciudad;
use App\Models\Pais;
use App\Models\DepartamentoEstado;
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
use App\Http\Responsable\avaluo\AvaluoClienteUpdate;
use App\Http\Responsable\avaluo\AvaluoVisitaTecnicaUpdate;
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

class AvaluoController extends Controller
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
                $avaluosIndex = $this->avaluosIndex();
                $this->shareData();
                return view('avaluo.index', compact('avaluosIndex'));
            }
        } catch (Exception $e) {
            alert()->error("Error Exception!");
            // return redirect()->to(route('login'));
            return back();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        try {
            $adminCtrl = new AdministradorController();
            $sesion = $adminCtrl->validarVariablesSesion();

            if (empty($sesion[0]) || is_null($sesion[0]) &&
                empty($sesion[1]) || is_null($sesion[1]) &&
                empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
            {
                return view('inicio_sesion.login');
            } else {
                $calcularAvaluo = $this->calcularAvaluo($idVisita);
                $calcularAvaluo2 = $this->calcularAvaluo2($idVisita);
                $this->shareData();

                // dd($calcularAvaluo);
                return view('avaluo.edit', compact('calcularAvaluo', 'calcularAvaluo2'));
            }
        } catch (Exception $e) {
            dd($e);
            alert()->error("Error Exception!");
            return back();
        }
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

    public function avaluoClienteUpdate()
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
                return new AvaluoClienteUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoVisitaTecnicaUpdate()
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
                return new AvaluoVisitaTecnicaUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoInfoJuridicaUpdate()
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
                return new AvaluoInfoJuridicaUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoInfoInmuebleUpdate()
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
                return new AvaluoInfoInmuebleUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoCaracteristicasInmuebleUpdate()
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
                return new AvaluoCaracteristicasInmuebleUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoAcabadosInmuebleUpdate()
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
                return new AvaluoAcabadosInmuebleUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoCalificacionInmuebleUpdate()
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
                return new AvaluoCalificacionInmuebleUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoDotacionComunalUpdate()
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
                return new AvaluoDotacionComunalUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoInfoSectorUpdate()
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
                return new AvaluoInfoSectorUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoCondiUrbanisticasUpdate()
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
                return new AvaluoCondiUrbanisticasUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoObserGeneralesUpdate()
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
                return new AvaluoObserGeneralesUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoRegFotograficoUpdate()
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
                return new AvaluoRegFotograficoUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoValorEstimadoUpdate()
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
                return new AvaluoValorEstimadoUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoEstadoConservacionUpdate()
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
                return new AvaluoEstadoConservacionUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
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

    private function shareData()
    {
        view()->share('tipo_documento', TipoDocumento::orderBy('decripcion_documento', 'asc')->pluck('decripcion_documento', 'id_tipo_documento'));
        view()->share('tipo_persona', TipoPersona::orderBy('tipo_persona', 'asc')->pluck('tipo_persona', 'id_tipo_persona'));
        view()->share('dirigido_a', DirigidoA::orderBy('dirigido_a', 'asc')->pluck('dirigido_a', 'id_dirigido_a'));
        view()->share('referido_por', ReferidoPor::orderBy('referido_por', 'asc')->pluck('referido_por', 'id_referido_por'));
        view()->share('red_social', RedSocial::orderBy('red_social', 'asc')->pluck('red_social', 'id_red_social'));
        view()->share('avaluador', Usuario::orderBy('nombres', 'asc')->whereIn('id_rol', [1,2,4])->pluck('nombres', 'id_usuario'));
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
        view()->share('calificacion_general', CalificacionGeneral::orderBy('id_calificacion_general', 'asc')->pluck('calificacion_general', 'id_calificacion_general'));
        view()->share('tipo_vias', TipoVias::orderBy('tipo_vias', 'asc')->pluck('tipo_vias', 'id_tipo_vias'));
        view()->share('tipo_piso', TipoPiso::orderBy('tipo_pisos', 'asc')->pluck('tipo_pisos', 'id_tipo_piso'));
        view()->share('tipo_banio', TipoBanio::orderBy('id_tipo_banio', 'asc')->pluck('tipo_banio', 'id_tipo_banio'));
        view()->share('tipo_cocina', TipoCocina::orderBy('id_tipo_cocina', 'asc')->pluck('tipo_cocina', 'id_tipo_cocina'));
        view()->share('tipo_meson', TipoMeson::orderBy('tipo_meson', 'asc')->pluck('tipo_meson', 'id_tipo_meson'));
        view()->share('comunas', Comuna::orderBy('comuna', 'asc')->pluck('comuna', 'id_comuna'));
        view()->share('factor_calidad', FactorCalidad::orderBy('factor_calidad', 'asc')->pluck('factor_calidad', 'id_factor_calidad'));
        view()->share('factor_zona', FactorZona::orderBy('factor_zona', 'asc')->pluck('factor_zona', 'id_factor_zona'));
        view()->share('factor_tiempo', FactorTiempo::orderBy('id_factor_tiempo', 'asc')->pluck('factor_tiempo', 'id_factor_tiempo'));
        view()->share('factor_pendiente', FactorPendiente::orderBy('id_factor_pendiente', 'asc')->pluck('factor_pendiente', 'id_factor_pendiente'));
        view()->share('factor_ubicacion', FactorUbicacion::orderBy('id_factor_ubicacion', 'asc')->pluck('factor_ubicacion', 'id_factor_ubicacion'));
        view()->share('estado_conservacion_opciones', EstadoConservacionOpciones::orderBy('estado_conservacion_opciones', 'asc')->pluck('estado_conservacion_opciones', 'id_estado_conservacion_opciones'));
    }

    //=========================================================
    //=========================================================

    public function cliVisitaAvaluo($idVisita)
    {
        return DB::table('clientes')
                ->leftjoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                ->leftjoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'clientes.id_doc_cliente')
                ->leftjoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
                ->leftjoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
                ->select(   'id_cliente',
                            'cli_nombres',
                            'clientes.id_doc_cliente',
                            'decripcion_documento as cli_tipo_doc',
                            'documento_cliente',
                            'fecha_nacimiento',
                            'cli_celular',
                            'cli_email',
                            'clientes.id_tipo_persona',
                            'tipo_persona',
                            'clientes.id_referido_por',
                            'referido_por',
                            'clientes.id_red_social',
                            'redes_sociales.red_social',
                            'clientes.nombre_quien_refiere',
                            'clientes.empresa_que_refiere'
                        )
                ->where('id_cliente', $idVisita)
                ->whereNull('clientes.deleted_at')
                ->first();
    }

    //=========================================================
    //=========================================================

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

    //=========================================================
    //=========================================================

    public function avaluosIndex()
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
                    ->leftjoin('si_no','si_no.id_si_no','=','visitas.id_visitado')
                    ->leftjoin('usuarios','usuarios.id_usuario','=','visitas.id_visitador')
                    ->select(
                        'visitas.id_cliente',
                        'visitas.id_visita',
                        'clientes.cli_nombres',
                        'dirigido_a.dirigido_a',
                        'visitas.objeto_avaluo',
                        'descripcion_ciudad',
                        'direccion',
                        'tipo_inmueble.tipo_inmueble',
                        'visitas.area',
                        'estrato.indicador_numerico as estrato',
                        'visitas.porcentaje_descuento',
                        'visitas.valor_cotizacion',
                        'descripcion_si_no',
                        'fecha_visita',
                        DB::raw('DATE_FORMAT(FROM_UNIXTIME(fecha_visita), "%d-%m-%Y") as fecha_visita'),
                        DB::raw('DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(fecha_visita), INTERVAL 3 DAY), "%d-%m-%Y") as fecha_informe')
                    )
                    ->whereNull('visitas.deleted_at')
                    ->whereNull('clientes.deleted_at')
                    ->where('visitas.id_visitado',1)
                    ->orderBy('visitas.id_visita', 'DESC')
                    ->get()
                    ->toArray();
    }

    //=========================================================
    //=========================================================

    public function calcularAvaluo($idVisita)
    {
        // return Visita::with(
        //                         'usuario',
        //                         'cliente',
        //                         'cliente.tipoDocCliente',
        //                         'tipoPersona',
        //                         'tipoDocCliente',
        //                         'tipoDocEmpresa',
        //                         'referidoPor',
        //                         'redSocial',
        //                         'clientePais',
        //                         'visitaPais',
        //                         'clienteDepartamento',
        //                         'visitaDepartamento',
        //                         'clienteCiudad',
        //                         'visitaCiudad',
        //                         'tipoInmueble',
        //                         'infoInmueble',
        //                         'tipoVivienda',
        //                         'usoInmueble',
        //                         'visitado',
        //                         'tipoSuelo',
        //                         'topografia',
        //                         'forma',
        //                         'estrato',
        //                         'pisosInmueble',
        //                         'pisosEdificio',
        //                         'remodelado',
        //                         'condicionInmueble',
        //                         'caracteristicasInmueble',
        //                         'cocinas',
        //                         'habitaciones',
        //                         'salas',
        //                         'habitacionesServicio',
        //                         'comedores',
        //                         'baniosServicio', 'baniosSocial', 'baniosPrivado', 'balcones',
        //                         'zonaRopa', 'estudios', 'patios', 'vestier', 'escalaEmergencia',
        //                         'closets', 'shutBasura', 'parqueaderos', 'cuartoUtil', 'kioskos',
        //                         'piscinas', 'establos', 'billares','ascensores', 'calificacionInmueble',
        //                         'dotacionComunal', 'condicionesUrbanisticas', 'infoSector',
        //                         'observacionesGenerales', 'valorEstimadoAvaluo', 'estadoConservacion',
        //                         'registroFotografico')
        //                         ->where('visitas.id_visita', $idVisita)
        //                         ->first();

        return DB::table('visitas')
                    ->leftjoin('clientes','clientes.id_cliente','=','visitas.id_cliente')
                    ->leftjoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                    ->leftjoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
                    ->leftjoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
                    ->leftjoin('dirigido_a','dirigido_a.id_dirigido_a','=','visitas.id_dirigido_a')
                    ->leftjoin('tipo_documento as id_tdoc_cliente','id_tdoc_cliente.id_tipo_documento','=','clientes.id_doc_cliente')
                    ->leftjoin('tipo_documento as id_tdoc_empresa','id_tdoc_empresa.id_tipo_documento','=','visitas.id_doc_empresa')
                    ->leftjoin('pais as cliente_pais','cliente_pais.id_pais','=','clientes.id_pais')
                    ->leftjoin('pais as visita_pais','visita_pais.id_pais','=','visitas.id_pais')
                    ->leftjoin('departamento_estado as cliente_dpto','cliente_dpto.id_departamento_estado','=','clientes.id_dpto_estado')
                    ->leftjoin('departamento_estado as visita_dpto','visita_dpto.id_departamento_estado','=','visitas.id_departamento')
                    ->leftjoin('ciudad as cliente_ciudad','cliente_ciudad.id_ciudad','=','clientes.id_ciudad')
                    ->leftjoin('ciudad as visita_ciudad','visita_ciudad.id_ciudad','=','visitas.id_ciudad')
                    ->leftjoin('tipo_inmueble','tipo_inmueble.id_tipo_inmueble','=','visitas.id_tipo_inmueble')
                    ->leftjoin('indicador_numerico as estrato','estrato.id_indicador_numerico','=','visitas.id_estrato')
                    ->leftjoin('si_no','si_no.id_si_no','=','visitas.id_visitado')
                    ->leftjoin('usuarios','usuarios.id_usuario','=','visitas.id_visitador')
                    ->leftjoin('info_inmueble','info_inmueble.id_visita','=','visitas.id_visita')
                    ->leftjoin('tipo_vivienda','tipo_vivienda.id_tipo_vivienda','=','info_inmueble.id_tipo_vivienda')
                    ->leftjoin('uso_inmueble','uso_inmueble.id_uso_inmueble','=','info_inmueble.id_uso_inmueble')
                    ->leftjoin('tipo_suelo','tipo_suelo.id_tipo_suelo','=','info_inmueble.id_tipo_suelo')
                    ->leftjoin('topografia','topografia.id_topografia','=','info_inmueble.id_topografia')
                    ->leftjoin('forma','forma.id_forma','=','info_inmueble.id_forma')
                    ->leftjoin('indicador_numerico as pisos_inmueble','pisos_inmueble.id_indicador_numerico','=','info_inmueble.pisos_inmueble')
                    ->leftjoin('indicador_numerico as pisos_edificio','pisos_edificio.id_indicador_numerico','=','info_inmueble.pisos_edificio')
                    ->leftjoin('si_no as remodelado','remodelado.id_si_no','=','info_inmueble.remodelado')
                    ->leftjoin('condicion_inmueble','condicion_inmueble.id_condicion_inmueble','=','info_inmueble.id_condicion_inmueble')
                    ->leftjoin('caracteristicas_inmueble','caracteristicas_inmueble.id_visita','=','visitas.id_visita')
                    ->leftjoin('indicador_numerico as cocinas','cocinas.id_indicador_numerico','=','caracteristicas_inmueble.cocinas')
                    ->leftjoin('indicador_numerico as habitaciones','habitaciones.id_indicador_numerico','=','caracteristicas_inmueble.habitaciones')
                    ->leftjoin('indicador_numerico as salas','salas.id_indicador_numerico','=','caracteristicas_inmueble.salas')
                    ->leftjoin('indicador_numerico as habitaciones_servicio','habitaciones_servicio.id_indicador_numerico','=','caracteristicas_inmueble.habitaciones_servicio')
                    ->leftjoin('indicador_numerico as comedores','comedores.id_indicador_numerico','=','caracteristicas_inmueble.comedores')
                    ->leftjoin('indicador_numerico as banios_servicio','banios_servicio.id_indicador_numerico','=','caracteristicas_inmueble.banios_servicio')
                    ->leftjoin('indicador_numerico as banios_social','banios_social.id_indicador_numerico','=','caracteristicas_inmueble.banios_social')
                    ->leftjoin('indicador_numerico as banios_privado','banios_privado.id_indicador_numerico','=','caracteristicas_inmueble.banios_privado')
                    ->leftjoin('indicador_numerico as balcones','balcones.id_indicador_numerico','=','caracteristicas_inmueble.balcones')
                    ->leftjoin('indicador_numerico as zona_ropa','zona_ropa.id_indicador_numerico','=','caracteristicas_inmueble.zona_ropa')
                    ->leftjoin('indicador_numerico as estudios','estudios.id_indicador_numerico','=','caracteristicas_inmueble.estudios')
                    ->leftjoin('indicador_numerico as patios','patios.id_indicador_numerico','=','caracteristicas_inmueble.patios')
                    ->leftjoin('indicador_numerico as vestier','vestier.id_indicador_numerico','=','caracteristicas_inmueble.vestier')
                    ->leftjoin('indicador_numerico as escala_emergencia','escala_emergencia.id_indicador_numerico','=','caracteristicas_inmueble.escala_emergencia')
                    ->leftjoin('indicador_numerico as closets','closets.id_indicador_numerico','=','caracteristicas_inmueble.closets')
                    ->leftjoin('indicador_numerico as shut_basura','shut_basura.id_indicador_numerico','=','caracteristicas_inmueble.shut_basura')
                    ->leftjoin('indicador_numerico as parqueaderos','parqueaderos.id_indicador_numerico','=','caracteristicas_inmueble.cant_parqueaderos')
                    ->leftjoin('indicador_numerico as cuarto_util','cuarto_util.id_indicador_numerico','=','caracteristicas_inmueble.cant_cuarto_util')
                    ->leftjoin('indicador_numerico as kioskos','kioskos.id_indicador_numerico','=','caracteristicas_inmueble.cant_kioskos')
                    ->leftjoin('indicador_numerico as piscinas','piscinas.id_indicador_numerico','=','caracteristicas_inmueble.cant_piscinas')
                    ->leftjoin('indicador_numerico as establos','establos.id_indicador_numerico','=','caracteristicas_inmueble.cant_establos')
                    ->leftjoin('indicador_numerico as billares','billares.id_indicador_numerico','=','caracteristicas_inmueble.cant_billares')
                    ->leftjoin('indicador_numerico as ascensores','ascensores.id_indicador_numerico','=','caracteristicas_inmueble.cant_ascensores')
                    ->leftjoin('acabados_inmueble','acabados_inmueble.id_visita','=','visitas.id_visita')
                    ->leftjoin('calificacion_inmueble','calificacion_inmueble.id_visita','=','visitas.id_visita')
                    ->leftjoin('dotacion_comunal','dotacion_comunal.id_visita','=','visitas.id_visita')
                    ->leftjoin('condiciones_urbanisticas','condiciones_urbanisticas.id_visita','=','visitas.id_visita')
                    ->leftjoin('info_sector','info_sector.id_visita','=','visitas.id_visita')
                    ->leftjoin('observaciones_generales','observaciones_generales.id_visita','=','visitas.id_visita')
                    ->leftjoin('valor_estimado_avaluo','valor_estimado_avaluo.id_visita','=','visitas.id_visita')
                    ->leftjoin('estado_conservacion','estado_conservacion.id_visita','=','visitas.id_visita')
                    ->leftjoin('registro_fotografico','registro_fotografico.id_visita','=','visitas.id_visita')
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
                        'cliente_pais.id_pais as cli_pais',
                        'cliente_dpto.id_departamento_estado as cli_dpto',
                        'cliente_ciudad.id_ciudad as cli_ciudad',
                        'clientes.id_referido_por',
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
                        'visita_pais.id_pais as visita_pais',
                        'visita_pais.descripcion_pais',
                        'visita_dpto.id_departamento_estado as id_vis_dpto',
                        'visita_dpto.descripcion_departamento as vis_dpto',
                        'visita_ciudad.id_ciudad as vis_ciudad',
	                    'visita_ciudad.descripcion_ciudad',
	                    'visitas.id_comuna',
                        'visitas.sector',
                        'visitas.cerca_de',
                        'visitas.barrio',
                        'visitas.unidad_edificio',
                        'visitas.direccion',
                        'tipo_inmueble.id_tipo_inmueble',
                        'tipo_inmueble.tipo_inmueble',
                        'visitas.area',
                        'estrato.id_indicador_numerico as estrato',
                        'visitas.numero_inmueble',
                        'visitas.porcentaje_descuento',
                        'visitas.valor_cotizacion',
                        'visitas.latitud',
                        'visitas.longitud',
                        'visitas.obser_visita',
                        'visitas.id_visitado',
                        'visitas.fecha_visita',
                        'visitas.hora_visita',
                        'visitas.id_visitador',
                        DB::raw("CONCAT(nombres, ' ', apellidos) AS nombres_visitador"),
                        'info_inmueble.pisos_inmueble',
                        'info_inmueble.pisos_edificio',
                        'info_inmueble.id_tipo_vivienda',
                        'info_inmueble.id_uso_inmueble',
                        'info_inmueble.id_tipo_suelo',
                        'info_inmueble.id_topografia',
                        'info_inmueble.id_forma',
                        'info_inmueble.pisos_inmueble',
                        'info_inmueble.pisos_edificio',
                        'info_inmueble.valor_administracion',
                        'info_inmueble.altura',
                        'info_inmueble.frente',
                        'info_inmueble.fondo',
                        'info_inmueble.remodelado',
                        'info_inmueble.area_libre',
                        'info_inmueble.anios_remodelacion',
                        'info_inmueble.area_patios',
                        'info_inmueble.id_condicion_inmueble',
                        'info_inmueble.obs_info_inmueble',
                        'caracteristicas_inmueble.cocinas',
                        'caracteristicas_inmueble.habitaciones',
                        'caracteristicas_inmueble.salas',
                        'caracteristicas_inmueble.habitaciones_servicio',
                        'caracteristicas_inmueble.comedores',
                        'caracteristicas_inmueble.banios_servicio',
                        'caracteristicas_inmueble.banios_social',
                        'caracteristicas_inmueble.banios_privado',
                        'caracteristicas_inmueble.balcones',
                        'caracteristicas_inmueble.zona_ropa',
                        'caracteristicas_inmueble.estudios',
                        'caracteristicas_inmueble.patios',
                        'caracteristicas_inmueble.vestier',
                        'caracteristicas_inmueble.escala_emergencia',
                        'caracteristicas_inmueble.closets',
                        'caracteristicas_inmueble.shut_basura',
                        'caracteristicas_inmueble.cant_parqueaderos',
                        'caracteristicas_inmueble.cant_cuarto_util',
                        'caracteristicas_inmueble.cant_kioskos',
                        'caracteristicas_inmueble.cant_piscinas',
                        'caracteristicas_inmueble.cant_establos',
                        'caracteristicas_inmueble.cant_billares',
                        'caracteristicas_inmueble.cant_ascensores',
                        'caracteristicas_inmueble.obs_caract_inmueble',
                        'acabados_inmueble.id_sistema_constructivo',
                        'acabados_inmueble.porton_principal',
                        'acabados_inmueble.id_tipo_fachada',
                        'acabados_inmueble.puertas',
                        'acabados_inmueble.id_tipo_muro',
                        'acabados_inmueble.id_ventaneria',
                        'acabados_inmueble.id_tipo_techo',
                        'acabados_inmueble.servicios_publicos',
                        'acabados_inmueble.pisos',
                        'acabados_inmueble.telefono',
                        'acabados_inmueble.banios',
                        'acabados_inmueble.energia',
                        'acabados_inmueble.cocina',
                        'acabados_inmueble.agua',
                        'acabados_inmueble.meson',
                        'acabados_inmueble.gas',
                        'acabados_inmueble.patios',
                        'acabados_inmueble.obs_acabados_inmueble',
                        'calificacion_inmueble.cal_estructura',
                        'calificacion_inmueble.cal_porton_ppal',
                        'calificacion_inmueble.cal_fachada',
                        'calificacion_inmueble.cal_puertas',
                        'calificacion_inmueble.cal_muros',
                        'calificacion_inmueble.cal_ventaneria',
                        'calificacion_inmueble.cal_techos',
                        'calificacion_inmueble.cal_carpinteria',
                        'calificacion_inmueble.cal_pisos',
                        'calificacion_inmueble.cal_ventilacion',
                        'calificacion_inmueble.cal_cocina',
                        'calificacion_inmueble.cal_iluminacion',
                        'calificacion_inmueble.cal_banios',
                        'calificacion_inmueble.cal_distribucion',
                        'calificacion_inmueble.cal_zona_ropas',
                        'calificacion_inmueble.cal_humedades',
                        'calificacion_inmueble.cal_patios',
                        'calificacion_inmueble.obs_calificacion_inmueble',
                        'dotacion_comunal.porteria_24',
                        'dotacion_comunal.parqueo_comun',
                        'dotacion_comunal.juegos_infantiles',
                        'dotacion_comunal.zona_mascotas',
                        'dotacion_comunal.piscinas',
                        'dotacion_comunal.zonas_verdes',
                        'dotacion_comunal.sauna',
                        'dotacion_comunal.salon_social',
                        'dotacion_comunal.turco',
                        'dotacion_comunal.canchas',
                        'dotacion_comunal.gimnasio',
                        'dotacion_comunal.playground',
                        'dotacion_comunal.barbecue',
                        'dotacion_comunal.supermercado',
                        'dotacion_comunal.sala_cine',
                        'dotacion_comunal.cafeteria',
                        'dotacion_comunal.restaurante',
                        'dotacion_comunal.squash',
                        'dotacion_comunal.obs_dotacion_comunal',
                        'condiciones_urbanisticas.id_valorizacion',
                        'condiciones_urbanisticas.cu_alumbrado_publico',
                        'condiciones_urbanisticas.cu_transporte',
                        'condiciones_urbanisticas.cu_orden_publico',
                        'condiciones_urbanisticas.cu_seguridad',
                        'condiciones_urbanisticas.cu_salubridad',
                        'condiciones_urbanisticas.cu_vias',
                        'condiciones_urbanisticas.id_tipo_vias',
                        'condiciones_urbanisticas.cu_aceras',
                        'condiciones_urbanisticas.cu_red_gas',
                        'condiciones_urbanisticas.cu_red_telco',
                        'condiciones_urbanisticas.cu_red_acueducto',
                        'condiciones_urbanisticas.cu_red_alcantarillado',
                        'condiciones_urbanisticas.cu_barrios_sectores',
                        'condiciones_urbanisticas.cu_tipo_edificaciones',
                        'condiciones_urbanisticas.obs_condiciones_urbanisticas',
                        'info_sector.barrios_sectores',
                        'info_sector.actividad_predominante',
                        'info_sector.transporte',
                        'info_sector.vias_acceso',
                        'observaciones_generales.observaciones_generales',
                        'valor_estimado_avaluo.valor_estimado_inmueble',
                        'estado_conservacion.id_factor_calidad',
                        'estado_conservacion.id_factor_zona',
                        'estado_conservacion.id_factor_tiempo',
                        'estado_conservacion.id_factor_pendiente',
                        'estado_conservacion.valor_pendiente',
                        'estado_conservacion.id_factor_ubicacion',
                        'estado_conservacion.valor_ubicacion',
                        'estado_conservacion.id_estado_conservacion_opciones',
                        'registro_fotografico.rf_fachada',
                        'registro_fotografico.rf_entrada',
                        'registro_fotografico.rf_sala1',
                        'registro_fotografico.rf_sala2',
                        'registro_fotografico.rf_sala3',
                        'registro_fotografico.rf_comedor1',
                        'registro_fotografico.rf_comedor2',
                        'registro_fotografico.rf_comedor3',
                        'registro_fotografico.rf_cocina1',
                        'registro_fotografico.rf_cocina2',
                        'registro_fotografico.rf_cocina3',
                        'registro_fotografico.rf_habitacion1',
                        'registro_fotografico.rf_habitacion2',
                        'registro_fotografico.rf_habitacion3',
                        'registro_fotografico.rf_habitacion4',
                        'registro_fotografico.rf_habitacion5',
                        'registro_fotografico.rf_habitacion6',
                        'registro_fotografico.rf_habitacion7',
                        'registro_fotografico.rf_bano1',
                        'registro_fotografico.rf_bano2',
                        'registro_fotografico.rf_bano3',
                        'registro_fotografico.rf_patio1',
                        'registro_fotografico.rf_patio2',
                        'registro_fotografico.rf_patio3',
                        'registro_fotografico.rf_estudio1',
                        'registro_fotografico.rf_estudio2',
                        'registro_fotografico.rf_estudio3',
                        'registro_fotografico.rf_cuarto_util1',
                        'registro_fotografico.rf_cuarto_util2',
                        'registro_fotografico.rf_cuarto_util3',
                        'registro_fotografico.rf_pasillo1',
                        'registro_fotografico.rf_pasillo2',
                        'registro_fotografico.rf_pasillo3',
                        'registro_fotografico.rf_zona_ropa1',
                        'registro_fotografico.rf_zona_ropa2',
                        'registro_fotografico.rf_zona_ropa3',
                        'registro_fotografico.rf_balcon1',
                        'registro_fotografico.rf_balcon2',
                        'registro_fotografico.rf_balcon3'
                    )
                    ->where('visitas.id_visita', $idVisita)
                    ->whereNull('visitas.deleted_at')
                    ->whereNull('clientes.deleted_at')
                    ->first();
    }

    //=========================================================
    //=========================================================

    public function calcularAvaluo2($idVisita)
    {
        return DB::table('visitas')
                    ->leftjoin('info_juridica','info_juridica.id_visita','=','visitas.id_visita')
                    ->select(
                        'visitas.id_visita',
                        'propietario1',
                        'doc_propietario1',
                        'propietario2',
                        'doc_propietario2',
                        'matricula_inmueble',
                        'coeficiente_copropiedad',
                        'certificado_libertad',
                        'escritura_publica',
                        'notaria',
                        'imp_predial_anual',
                        'administracion',
                        'avaluo_catastral',
                        'normas_usos',
                        'mejor_mayor_uso'
                    )
                    ->where('visitas.id_visita', $idVisita)
                    ->whereNull('visitas.deleted_at')
                    ->first();
    }

    //=========================================================

    public function consultarFactorPendiente()
    {
        $id_factor_pendiente = request('id_factor_pendiente', null);

        return FactorPendiente::select('valor_pendiente')
                                ->where('id_factor_pendiente', $id_factor_pendiente)
                                ->first();
    }

    //=========================================================

    public function consultarFactorUbicacion()
    {
        $id_factor_ubicacion = request('id_factor_ubicacion', null);

        return FactorUbicacion::select('valor_ubicacion')
                                ->where('id_factor_ubicacion', $id_factor_ubicacion)
                                ->first();
    }
}
