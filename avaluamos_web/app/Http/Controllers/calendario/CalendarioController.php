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
                // $this->shareData();
                return view('calendario.index');
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try 
        // {
        //     DB::connection('compras')->beginTransaction();

        //     //==============================================================//
            
        //     if(!Auth::check())
        //     {
        //         return redirect()->to(route('login'));
        //         exit;
        //     }
            
        //     //==============================================================//

        //     $this->validate($request, [
        //         // 'fecha_mtto_programado' => 'required',
        //     ]);

        //     //==============================================================//

        //     $fecha_mtto_programado = Carbon::parse(request('fecha_mtto_programado', null));
        //     $fecha_mtto_programado_meses = Carbon::parse(request('fecha_mtto_programado', null));
        //     $id_tipo_categoria = request('id_tipo_categoria', null );
        //     $segaut_codigo_create = request('segaut_codigo_create', null );
        //     $id_tipo_mtto = request('id_tipo_mtto', null);
        //     $sed_codigo = request('sed_codigo', null);
        //     $id_proveedor = request('id_proveedor', null);
        //     $usu_codigo = auth()->user()->usu_codigo;

        //     // dd($segaut_codigo_create);

        //     $frecuencia_mtto_categoria = TipoCategoria::select('frecuencia_mtto')->where('id_tipo_categoria', $id_tipo_categoria)->first();
            
        //     if ( isset($frecuencia_mtto_categoria->frecuencia_mtto) && !is_null($frecuencia_mtto_categoria->frecuencia_mtto) && !empty($frecuencia_mtto_categoria->frecuencia_mtto) )
        //     {
        //         $fecha_mtto_proximo = $fecha_mtto_programado_meses->addMonths($frecuencia_mtto_categoria->frecuencia_mtto);
        //     }
        //     else
        //     {
        //         $fecha_mtto_proximo = $fecha_mtto_programado;
        //     }

        //     //==============================================================/

        //     $registro = CronogramaInfraestructura::create([
        //         'fecha_mtto_programado' => $fecha_mtto_programado->timestamp,
        //         'fecha_mtto_proximo' => $fecha_mtto_proximo->timestamp,
        //         'usu_codigo' => $usu_codigo,
        //         'id_tipo_categoria' => $id_tipo_categoria,
        //         'segaut_codigo' => $segaut_codigo_create,
        //         'sed_codigo' => $sed_codigo,
        //         'id_tipo_mtto' => $id_tipo_mtto,
        //         'id_proveedor' => $id_proveedor,
        //     ]);
        //     DB::connection('compras')->commit();

        //     alert()->success('Mantenimiento a Infraestructura creado correctamente.');
        //     return redirect('/compras/cronograma_mtto_infra');
        // }
        // catch (Exception $e)
        // {
        //     dd($e);
        //     DB::connection('compras')->rollBack();
        //     alert()->error('Ha ocurrido un error, íntente de nuevo si el problema persiste, contacte el área de sistemas.');
        // }
    }

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // DB::connection('compras')->beginTransaction();

        //==============================================================//

        // $id_infra_cronograma_editar = request('id_infra_cronograma_editar', null);
        // $id_tipo_categoria_editar = request('id_tipo_categoria_editar', null);
        // $id_placa_editar = request('id_placa_editar', null);
        // $sed_codigo_editar = request('sed_codigo_editar', null);
        // $id_tipo_mtto_editar = request('id_tipo_mtto_editar', null);
        // $id_proveedor_editar = request('id_proveedor_editar', null);
        // $fecha_mtto_programado_editar = Carbon::parse(request('fecha_mtto_programado_editar', null));
        // $fecha_mtto_programado_editar_meses = Carbon::parse(request('fecha_mtto_programado_editar', null));
        // $segaut_codigo_editar = request('segaut_codigo_editar', null);
        
        // $frecuencia_mtto_categoria = TipoCategoria::select('frecuencia_mtto')->where('id_tipo_categoria', $id_tipo_categoria_editar)->first();

        // if ( isset($frecuencia_mtto_categoria->frecuencia_mtto) && !is_null($frecuencia_mtto_categoria->frecuencia_mtto) && !empty($frecuencia_mtto_categoria->frecuencia_mtto) )
        // {
        //     $fecha_mtto_proximo_editar = $fecha_mtto_programado_editar_meses->addMonths($frecuencia_mtto_categoria->frecuencia_mtto);
        // }
        // else {
        //     $fecha_mtto_proximo_editar = $fecha_mtto_programado_editar;
        // }

        //===============================

        // $fecha_mtto_ejecutado_editar = Carbon::parse(request('fecha_mtto_ejecutado_editar', null));
        
        // if ( $fecha_mtto_programado_editar == $fecha_mtto_ejecutado_editar )
        // {
        //     $fecha_mtto_ejecutado_editar = $fecha_mtto_programado_editar->timestamp;
        // } else {
        //     $fecha_mtto_ejecutado_editar = null;
        // }
        
        //==============================================================//

        // try
        // {
        //     if(!Auth::check())
        //     {
        //         return redirect()->to(route('login'));
        //         exit;
        //     }
            
        //     //==============================================================//

        //     $evento_update = DB::table('compras.cronograma_infraestructura')
        //                     ->where('id_infra_cronograma', $id_infra_cronograma_editar)
        //                     ->update([
        //                         'id_tipo_categoria' => $id_tipo_categoria_editar,
        //                         'sed_codigo' => $sed_codigo_editar,
        //                         'id_tipo_mtto' => $id_tipo_mtto_editar,
        //                         'id_proveedor' => $id_proveedor_editar,
        //                         'fecha_mtto_ejecutado' => $fecha_mtto_ejecutado_editar,
        //                         'fecha_mtto_proximo' => $fecha_mtto_proximo_editar->timestamp,
        //                         'segaut_codigo' => $segaut_codigo_editar,
        //                     ]);

        //     if ($evento_update) {
        //         DB::connection('compras')->commit();
        //         alert()->success('Evento editado correctamente');
        //         return back();

        //     }else {
        //         DB::connection("compras")->rollback();
        //         alert()->error('Ha ocurrido un error editando el evento');
        //         return back();
        //     }
        // }
        // catch (Exception $e)
        // {
        //     dd($e);
        //     DB::connection('compras')->rollBack();
        //     alert()->error('Ha ocurrido un error, intente de nuevo si el problema persiste, contacte el área de sistemas.');
        //     return back();
        // }
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
                                        'fecha_visita_calendario',
                                        'visita_cumplida'
                                    )
                                    ->get();

            $arrayVisitasCalendario = array();

            foreach ($consultarVisitasCalendario as $visita)
            {
                if (isset($visita->visita_cumplida) && !is_null($visita->visita_cumplida) && $visita->visita_cumplida && !empty($visita->visita_cumplida)) {
                    $colorVisita = "#449D44";
                } else {
                    $colorVisita = "#EC971F";
                }

                array_push($arrayVisitasCalendario,
                    array(
                        "id" => $visita->id_visita_calendario,
                        "title" => $visita->nombre_cliente . "\n" . $visita->municipio,
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