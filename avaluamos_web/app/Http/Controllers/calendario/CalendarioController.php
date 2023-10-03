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
        view()->share('ciudades', Ciudad::orderBy('descripcion_ciudad', 'asc')->pluck('descripcion_ciudad', 'id_ciudad'));
    }

    //=========================================================
    //=========================================================

    public function consultarVisitasCalendario()
    {
        try {
            $consultarVisitasCalendario = DB::table('calendario')
                                    ->leftjoin('tipo_inmueble', 'tipo_inmueble.id_tipo_inmueble', '=', 'calendario.tipo_inmueble')
                                    ->leftjoin('ciudad', 'ciudad.id_ciudad', '=', 'calendario.municipio')
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
                 if (isset($visita->visita_cumplida) && !is_null($visita->visita_cumplida) && $visita->visita_cumplida && !empty($visita->visita_cumplida) && $visita->visita_cumplida!= 0) {
                    $colorVisita = "#449D44";
                } else {
                    $colorVisita = "#EC971F";
                }

                array_push($arrayVisitasCalendario,
                    array(
                        "id" => $visita->id_visita_calendario,
                        "title" => "\n". $visita->nombre_cliente ."\n". $visita->descripcion_ciudad,
                        "start" => $visita->fecha_visita_calendario,
                        "color" => $colorVisita,
                    )
                );
            }

            return response()->json(["visitas_calendario" => $arrayVisitasCalendario]);
        }
        catch (Exception $e) {
            dd($e);
        }
    }

    // ========================================================

    // public function consultarEventoInfraEdicion(Request $request)
    // {
    //     try {
    //         $consulta_evento_infra_edicion = DB::table('compras.cronograma_infraestructura')
    //                                 ->leftjoin('public.sedes', 'sedes.sed_codigo', '=', 'cronograma_infraestructura.sed_codigo')
    //                                 ->leftjoin('public.usuarios', 'usuarios.usu_codigo', '=', 'cronograma_infraestructura.usu_codigo')
    //                                 ->leftjoin('compras.tickets', 'tickets.tic_codigo', '=', 'cronograma_infraestructura.tic_codigo')
    //                                 ->leftjoin('compras.tipo_categorias', 'tipo_categorias.id_tipo_categoria', '=', 'cronograma_infraestructura.id_tipo_categoria')
    //                                 ->leftjoin('polizas.tipo_mantenimiento', 'tipo_mantenimiento.id_tipo_mtto', '=', 'cronograma_infraestructura.id_tipo_mtto')
    //                                 ->leftjoin('facturacion.proveedores', 'proveedores.id_proveedor', '=', 'cronograma_infraestructura.id_proveedor')
    //                                 ->leftjoin('polizas.seguro_vehiculo', 'seguro_vehiculo.segaut_codigo', '=', 'cronograma_infraestructura.segaut_codigo')
    //                                 ->select(
    //                                     DB::raw('to_char(to_timestamp(cronograma_infraestructura.fecha_mtto_programado), \'YYYY-MM-DD\') as fecha_programado'),
    //                                     DB::raw('to_char(to_timestamp(cronograma_infraestructura.fecha_mtto_ejecutado), \'YYYY-MM-DD\') as fecha_ejecutado'),
    //                                     DB::raw('to_char(to_timestamp(cronograma_infraestructura.fecha_mtto_proximo), \'YYYY-MM-DD\') as fecha_proximo'),
    //                                     'usuarios.usu_usuario','sedes.sed_codigo','sedes.sed_descripcion','tipo_categorias.descripcion_categoria','tickets.tic_codigo','tipo_mantenimiento.id_tipo_mtto','tipo_mantenimiento.mtto_descripcion','proveedores.razon_social', 'proveedores.id_proveedor', 'cronograma_infraestructura.id_infra_cronograma', 'tipo_categorias.id_tipo_categoria', 'tipo_categorias.frecuencia_mtto','tickets.tic_codigo', 'seguro_vehiculo.segaut_codigo', 'seguro_vehiculo.placa','tipo_categorias.color_categoria')
    //                                 ->where('id_infra_cronograma', $request->id_infra_cronograma)
    //                                 ->first();

    //         // dd($consulta_evento_infra_edicion);

    //         return response()->json($consulta_evento_infra_edicion);
    //     }
    //     catch (Exception $th) {
    //         dd($th);
    //     }
    // }

    
}