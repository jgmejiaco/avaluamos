<?php

namespace App\Http\Controllers\avaluo;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
use App\Http\Responsable\avaluo\AvaluoIndex;
use App\Http\Responsable\avaluo\AvaluoEdit;
use App\Http\Responsable\avaluo\AvaluoVisitaCreateCliente;
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
    public function __construct()
    {
        $this->middleware('compartirShareData');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return new AvaluoIndex();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Error Exception!");
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
        try {
            return new AvaluoVisitaCreateCliente($idVisita);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error('Error Exception!');
            return back();
        }
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
            
            return new AvaluoEdit($idVisita);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
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
            return new AvaluoClienteUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoVisitaTecnicaUpdate()
    {
        try {
            return new AvaluoVisitaTecnicaUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoInfoJuridicaUpdate()
    {
        try {
            return new AvaluoInfoJuridicaUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoInfoInmuebleUpdate()
    {
        try {
            return new AvaluoInfoInmuebleUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoCaracteristicasInmuebleUpdate()
    {
        try {
            return new AvaluoCaracteristicasInmuebleUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoAcabadosInmuebleUpdate()
    {
        try {
            return new AvaluoAcabadosInmuebleUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoCalificacionInmuebleUpdate()
    {
        try {
            return new AvaluoCalificacionInmuebleUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoDotacionComunalUpdate()
    {
        try {
            return new AvaluoDotacionComunalUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoInfoSectorUpdate()
    {
        try {
            return new AvaluoInfoSectorUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoCondiUrbanisticasUpdate()
    {
        try {
            return new AvaluoCondiUrbanisticasUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoObserGeneralesUpdate()
    {
        try {
            return new AvaluoObserGeneralesUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoRegFotograficoUpdate()
    {
        try {
            return new AvaluoRegFotograficoUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoValorEstimadoUpdate()
    {
        try {
            return new AvaluoValorEstimadoUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    //=========================================================
    //=========================================================

    public function avaluoEstadoConservacionUpdate()
    {
        try {
            return new AvaluoEstadoConservacionUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
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
