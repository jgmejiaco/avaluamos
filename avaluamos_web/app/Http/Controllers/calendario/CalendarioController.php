<?php

namespace App\Http\Controllers\calendario;

use App\Http\Controllers\Controller;
use App\Http\Responsable\calendario\CalendarioStore;
use App\Http\Responsable\calendario\CalendarioUpdate;
use Exception;
use Illuminate\Http\Request;

class CalendarioController extends Controller
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
    public function index(Request $request)
    {
        try {
            return view('calendario.index');

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    // ======================================================================

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // ======================================================================

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            return new CalendarioStore();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    // ======================================================================

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

    // ======================================================================

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    // ======================================================================

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $calendario)
    {
        try {

            return new CalendarioUpdate($calendario);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    // ========================================================

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // ========================================================

    //=========================================================
    //=========================================================


    //=========================================================
    //=========================================================

    public function consultarVisitasCalendario()
    {
        try {
            $response = $this->getClientApi()->get('calendario_consultar_visitas');
            $respuesta = json_decode($response->getBody()->getContents());

            return response()->json([
                'visitas_calendario' => $respuesta->visitas_calendario ?? [],
            ]);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error consultarVisitasCalendario: '.$e->getMessage());
            alert()->error('Error', 'Error exception, intente de nuevo, si el problema continua, contacte a soporte.');
            return back();
        }
    }

    // ========================================================

    public function consultarVisitaCalendario()
    {
        $idVisitaCalendario = request('id_visita_calendario', null);

        try {
            if ($idVisitaCalendario === null || $idVisitaCalendario === '') {
                return response()->json(null);
            }

            $response = $this->getClientApi()->get('calendario_consultar_visita_individual/'.$idVisitaCalendario);
            $respuesta = json_decode($response->getBody()->getContents());

            return response()->json($respuesta->visitaCalendario ?? null);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error consultarVisitaCalendario: '.$e->getMessage());
            alert()->error('Error', 'Error exception, intente de nuevo, si el problema continua, contacte a soporte.');
            return back();
        }
    }

    // ========================================================

}