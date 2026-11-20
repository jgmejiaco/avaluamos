<?php

namespace App\Http\Controllers\visita;

use App\Http\Controllers\Controller;
use App\Support\FalloServicio;
use Exception;
use Illuminate\Http\Request;
use App\Http\Responsable\visita\VisitaIndex;
use App\Http\Responsable\visita\VisitaCreateCliente;
use App\Http\Responsable\visita\VisitaStore;
use App\Http\Responsable\visita\VisitaEdit;
use App\Http\Responsable\visita\VisitaClienteUpdate;
use App\Http\Responsable\visita\VisitaTecnicaUpdate;
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

class VisitaController extends Controller
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

            return new VisitaIndex();

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaIndex: '.$e->getMessage());
            alert()->error('Error cargando las visitas.');

            return redirect()->route('inicio');
        }
    }

    // =================================================================
    // =================================================================

    /**
     * Show the form for creating a new resource.
     * Resource: GET /visita/create?id_cliente={id}
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $clienteId = $request->query('id_cliente');

            if ($clienteId === null || $clienteId === '') {
                alert()->warning('Debe indicar el cliente para crear la visita.');
                return redirect()->route('cliente_potencial.index');
            }

            return new VisitaCreateCliente($clienteId);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error('Error', 'Error al consultar el cliente para crear la visita, por favor contacte a Soporte.');
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
        try {
            return new VisitaStore();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
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

            return new VisitaEdit($idVisita);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            logger()->error('Error VisitaEdit: '.$e->getMessage());
            alert()->error('Error cargando la visita.');
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

    public function visitaClienteUpdate(Request $request)
    {
        try {
            return new VisitaClienteUpdate();

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

    public function visitaTecnicaUpdate(Request $request)
    {
        try {
            return new VisitaTecnicaUpdate();

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

    public function visitaInfoInmuebleUpdate(Request $request)
    {
        try {
            return new VisitaInfoInmuebleUpdate();

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
    
    public function visitaCaracteristicasInmuebleUpdate(Request $request)
    {
        try {
            return new VisitaCaracteristicasInmuebleUpdate();

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
    
    public function visitaAcabadosInmuebleUpdate(Request $request)
    {
        try {
            return new VisitaAcabadosInmuebleUpdate();

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

    public function visitaCalificacionInmuebleUpdate(Request $request)
    {
        try {
            return new VisitaCalificacionInmuebleUpdate();

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

    public function visitaDotacionComunalUpdate(Request $request)
    {
        try {
            return new VisitaDotacionComunalUpdate();

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
    
    public function visitaInfoSectorUpdate(Request $request)
    {
        try {
            return new VisitaInfoSectorUpdate();

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
    
    public function visitaCondiUrbanisticasUpdate(Request $request)
    {
        try {
            return new VisitaCondiUrbanisticasUpdate();

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
    
    public function visitaObserGeneralesUpdate(Request $request)
    {
        try {
            return new VisitaObserGeneralesUpdate();

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
    
    public function visitaRegFotograficoUpdate(Request $request)
    {
        try {
            return new VisitaRegFotograficoUpdate();

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
    
    public function visitaValorEstimadoUpdate(Request $request)
    {
        try {
            return new VisitaValorEstimadoUpdate();

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
    
    public function visitaEstadoConservacionUpdate(Request $request)
    {
        try {
            return new VisitaEstadoConservacionUpdate();

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

    public function consultarEmpresa(Request $request)
    {
        try {
            $idEmpresa = request('id_dirigido_a', null);

            if ($idEmpresa === null || $idEmpresa === '' || $idEmpresa === '-1') {
                return response()->json(null);
            }

            $response = $this->getClientApi()->post('visita_consultar_empresa/'.$idEmpresa);
            $consultarEmpresa = json_decode($response->getBody()->getContents());

            return response()->json($consultarEmpresa);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error consultarEmpresa: '.$e->getMessage());
            return response()->json(null);
        }
    }

    //=========================================================
    //=========================================================

    public function consultarFactorPendiente()
    {
        try {
            $idFactorPendiente = request('id_factor_pendiente', null);

            if ($idFactorPendiente === null || $idFactorPendiente === '' || $idFactorPendiente === '-1') {
                return response()->json(null);
            }

            $response = $this->getClientApi()->post('visita_consultar_factor_pendiente', [
                'json' => [
                    'id_factor_pendiente' => $idFactorPendiente,
                ],
            ]);

            $factorPendiente = json_decode($response->getBody()->getContents());

            return response()->json($factorPendiente);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error consultarFactorPendiente: '.$e->getMessage());
            return response()->json(null);
        }
    }
    
    //=========================================================
    
    public function consultarFactorUbicacion()
    {
        try {
            $idFactorUbicacion = request('id_factor_ubicacion', null);

            if ($idFactorUbicacion === null || $idFactorUbicacion === '' || $idFactorUbicacion === '-1') {
                return response()->json(null);
            }

            $response = $this->getClientApi()->post('visita_consultar_factor_ubicacion', [
                'json' => [
                    'id_factor_ubicacion' => $idFactorUbicacion,
                ],
            ]);

            $factorUbicacion = json_decode($response->getBody()->getContents());

            return response()->json($factorUbicacion);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error consultarFactorUbicacion: '.$e->getMessage());
            return response()->json(null);
        }
    }

    //=========================================================

    public function visitaDireccion()
    {
        try {
            $idCliente = request('id_cliente', null);
            $direccionCreate = strtoupper((string) request('direccion_create', ''));

            if ($idCliente === null || $idCliente === '' || $direccionCreate === '') {
                return response()->json(null);
            }

            $response = $this->getClientApi()->post('visita_direccion_consulta_predio', [
                'json' => [
                    'id_cliente'       => $idCliente,
                    'direccion_create' => $direccionCreate,
                ],
            ]);

            $consultaPredio = json_decode($response->getBody()->getContents());

            return response()->json($consultaPredio);

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error visitaDireccion: '.$e->getMessage());
            return response()->json(null);
        }
    }

    //=========================================================
    //=========================================================
}
