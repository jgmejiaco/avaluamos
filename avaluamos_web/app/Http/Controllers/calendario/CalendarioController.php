<?php

namespace App\Http\Controllers\calendario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Exception;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use App\Http\Controllers\admin\AdministradorController;
use App\Http\Responsable\calendario\CalendarioStore;
use App\Http\Responsable\calendario\CalendarioUpdate;
use App\Models\TipoInmueble;
use App\Models\Ciudad;
use App\Models\SiNo;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
                $this->shareData();
                return view('calendario.index');
            }
        } catch (Exception $e) {
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
            $adminCtrl = new AdministradorController();
            $sesion = $adminCtrl->validarVariablesSesion();

            if (empty($sesion[0]) || is_null($sesion[0]) &&
                empty($sesion[1]) || is_null($sesion[1]) &&
                empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
            {
                return view('inicio_sesion.login');
            } else {
                return new CalendarioStore();
            }
        } catch (Exception $e) {
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
    public function update(Request $request)
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
                return new CalendarioUpdate();
            }
        } catch (Exception $e) {
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

    private function shareData()
    {
        view()->share('tipo_inmueble', TipoInmueble::orderBy('tipo_inmueble', 'asc')->pluck('tipo_inmueble', 'id_tipo_inmueble'));
        view()->share('si_no', SiNo::orderBy('descripcion_si_no', 'asc')->whereIn('id_si_no', [1,2])->pluck('descripcion_si_no', 'id_si_no'));
        // view()->share('ciudades', Ciudad::orderBy('descripcion_ciudad', 'asc')->pluck('descripcion_ciudad', 'id_ciudad'));
        view()->share('ciudades', $this->consultarCiudadesDptos());
    }

    //=========================================================
    //=========================================================

    public function consultarVisitasCalendario()
    {
        try {
            $consultarVisitasCalendario = DB::table('calendario')
                                    ->leftjoin('tipo_inmueble', 'tipo_inmueble.id_tipo_inmueble', '=', 'calendario.tipo_inmueble')
                                    ->leftjoin('ciudad', 'ciudad.id_ciudad', '=', 'calendario.municipio')
                                    ->leftjoin('si_no', 'si_no.id_si_no', '=', 'calendario.visita_cumplida')
                                    ->select(
                                        'id_visita_calendario',
                                        'nombre_cliente',
                                        'municipio',
                                        'descripcion_ciudad',
                                        DB::raw('DATE_FORMAT(FROM_UNIXTIME(fecha_visita_calendario), "%Y-%m-%d %H:%i") as fecha_visita_calendario'),
                                        'visita_cumplida'
                                    )
                                    ->get();

            $arrayVisitasCalendario = array();

            foreach ($consultarVisitasCalendario as $visita)
            {
                 if (isset($visita->visita_cumplida) && !is_null($visita->visita_cumplida) && !empty($visita->visita_cumplida) && $visita->visita_cumplida == 1) {
                    $colorVisita = "#449D44";
                } else {
                    $colorVisita = "red";
                }

                array_push($arrayVisitasCalendario,
                    array(
                        "id" => $visita->id_visita_calendario,
                        "title" => "\n". $visita->nombre_cliente ." - ". $visita->descripcion_ciudad,
                        "start" => $visita->fecha_visita_calendario,
                        "color" => $colorVisita,
                    )
                );
            }

            return response()->json(["visitas_calendario" => $arrayVisitasCalendario]);
        }
        catch (Exception $e) {
            alert()->error('Error', 'Error exception, intente de nuevo, si el problema continua, contacte a soporte.');
            return back();
        }
    }

    // ========================================================

    public function consultarVisitaCalendario()
    {
        $idVisitaCalendario = request('id_visita_calendario', null);

        try {
            $consultarVisitaCalendario = DB::table('calendario')
                                    ->leftjoin('tipo_inmueble', 'tipo_inmueble.id_tipo_inmueble', '=', 'calendario.tipo_inmueble')
                                    ->leftjoin('ciudad', 'ciudad.id_ciudad', '=', 'calendario.municipio')
                                    ->leftjoin('si_no', 'si_no.id_si_no', '=', 'calendario.visita_cumplida')
                                    ->leftjoin('departamento_estado', 'departamento_estado.id_departamento_estado', '=', 'ciudad.id_departamento_estado')
                                    ->select(
                                        'id_visita_calendario',
                                        'nombre_cliente',
                                        'celular',
                                        'calendario.tipo_inmueble as t_inmueble',
                                        'tipo_inmueble.tipo_inmueble',
                                        'municipio',
                                        'descripcion_ciudad',
                                        'calendario.barrio',
                                        'calendario.direccion',
                                        DB::raw('DATE_FORMAT(FROM_UNIXTIME(fecha_visita_calendario), "%Y-%m-%d %H:%i") as fecha_visita_calendario'),
                                        'calendario.visita_cumplida',
                                        'si_no.descripcion_si_no',
                                        DB::raw("CONCAT(ciudad.descripcion_ciudad, '-', departamento_estado.descripcion_departamento) as ciudadDpto"),
                                    )
                                    ->where('id_visita_calendario', $idVisitaCalendario)
                                    ->first();

            return response()->json($consultarVisitaCalendario);
        }
        catch (Exception $e) {
            alert()->error('Error', 'Error exception, intente de nuevo, si el problema continua, contacte a soporte.');
            return back();
        }
    }

    // ========================================================

    public function consultarCiudadesDptos()
    {
        try {
            return DB::table('ciudad')
                                    ->leftjoin('departamento_estado', 'departamento_estado.id_departamento_estado', '=', 'ciudad.id_departamento_estado')
                                    ->select(
                                        'ciudad.id_ciudad',
                                        DB::raw("CONCAT(ciudad.descripcion_ciudad, '-', departamento_estado.descripcion_departamento) as ciudadDpto"),
                                    )
                                    ->orderBy('ciudadDpto', 'asc')
                                    ->pluck('ciudadDpto', 'id_ciudad');
        }
        catch (Exception $e) {
            alert()->error('Error', 'Error exception, intente de nuevo, si el problema continua, contacte a soporte.');
            return back();
        }
    }
}