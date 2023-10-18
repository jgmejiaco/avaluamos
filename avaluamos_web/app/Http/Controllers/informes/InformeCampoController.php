<?php

namespace App\Http\Controllers\informes;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Http\Responsable\informes\RespuestaInforme;
use App\Models\Informe;
use App\Models\InformeCampo;

class InformeCampoController extends Controller
{
    /**
     * Ejemplo
     * @param Request $request [description]
     * @param  [type]  $codigo  [description]
     * @return Application|Factory|View [type] [description]
     */
    public function informe(Request $request, $codigo)
    {
        if (!Gate::allows('portal_servicios_informe_gerencial')) {abort(401);}

        $campos = InformeCampo::formulario($codigo);
        $informe = Informe::where('inf_codigo', $codigo)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    // ==================================================

    /**
     * informe gerencial de las cotizaciones del portal de servicios
     * @return Application|Factory|View [type] [description]
     */
    public function portalServicios()
    {
        if (!Gate::allows('portal_servicios_informe_gerencial')) {abort(401);}

        $campos = InformeCampo::formulario(127);
        $informe = Informe::where('inf_codigo', 127)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    // ==================================================

    /**
     * [informeGerencialCapacitaciones description]
     * @return Application|Factory|View [type] [description]
     */
    public function informeGerencialCapacitaciones()
    {
        if (!Gate::allows('capacitaciones_informe_gerencial')) {abort(401);}

        $campos = InformeCampo::formulario(96);
        $informe = Informe::where('inf_codigo', 96)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    // ==================================================

    public function informeGerencialEvaluaciones()
    {
        if (!Gate::allows('calidad_gestionar_evaluaciones_informe_gerencial')) {abort(401);}

        $campos = InformeCampo::formulario(103);
        $informe = Informe::where('inf_codigo', 103)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    // ==================================================

    public function informeGerencialLogisticaRutas()
    {
        if (!Gate::allows('logistica_productividad_rutas_informe_gerencial')) {abort(401);}

        $campos = InformeCampo::formulario(127);
        $informe = Informe::where('inf_codigo', 127)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    // ==================================================

    public function informeGerencialFacturacion()
    {
        if (!Gate::allows('contabilidad_facturacion_informe_gerencial')) {abort(401);}

        $asignadas = auth()->user()->contabilidad_empresas;
        if ($asignadas->count() === 1) {
            $emp = $asignadas->first();
            session()->put('empresa_id',$emp->id);
            session()->put('empresa_nombre',$emp->nombre);
        }

        $empresas = $asignadas->pluck('nombre','id');//para el select
        view()->share('empresas', $empresas);

        $campos = InformeCampo::formulario(129);
        $informe = Informe::where('inf_codigo', 129)->first();
        return view('informe', compact('campos', 'informe'));
    }

    // ==================================================

    /**
     * Respuesta de la tabla para el informe, dependiendo de los filtros
     * @param  Request $request petición con los filtros
     * @return RespuestaInforme          respuesta con el html de la tabla
     */
    public function envio(Request $request): RespuestaInforme
    {
        return new RespuestaInforme();
    }

    // ==================================================

    /**
     * Respuesta para descargar archivo excel
     * @param Request $request petición con los filtros
     * @return JsonResponse          respuesta con el html de la tabla
     * @throws \Exception
     */
    public function envio_archivo(Request $request): JsonResponse
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'correo_notificacion' => 'required|email:rfc'
            ]);

            // if ($validator->fails()) {
            //     return response()->json(["error"=>$validator->messages()->first(), "success"=>""], 200);
            // }

            $datos = $request->all();
            if (array_key_exists('checkbox', $datos)){
                cache(['datos' => $datos], now()->addMinutes(15));
                cache(['correo_notificacion' => $request->input('correo_notificacion')], now()->addMinutes(15));
                $path = base_path();
                shell_exec( "php {$path}/artisan command:informe > /dev/null 2>/dev/null &");

                return response()->json(["success"=>"Se ha enviado la solicitud del informe se le enviará correo de notificación con el informe.",'error'=>""], 200);
            }
            return response()->json(["error"=>"No se puede generar el informe, seleccione bien los filtros."], 200);
        }
        return response()->json(["error"=>"Solo se aceptan peticiones por ajax."], 200);
    }
}
