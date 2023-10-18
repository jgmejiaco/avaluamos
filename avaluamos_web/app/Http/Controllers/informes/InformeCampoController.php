<?php

namespace App\Http\Controllers\Informes;

use App\Models\Informe;
use App\Models\InformeCampo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Http\Responsables\Informes\RespuestaInforme;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\logistica\Cliente;

class InformeCampoController extends Controller
{

    /**
     * Ejemplo
     * @param Request $request [description]
     * @param  [type]  $codigo  [description]
     * @return Application|Factory|View [type]           [description]
     */
    public function informe(Request $request, $codigo)
    {
        $campos = InformeCampo::formulario($codigo);
        $informe = Informe::where('inf_codigo', $codigo)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    /**
     * informe gerencial de las cotizaciones del portal de servicios
     * @return Application|Factory|View [type] [description]
     */
    public function portalServicios()
    {
        if (!Gate::allows('portal_servicios_informe_gerencial')) {
            abort(401);
        }
        $campos = InformeCampo::formulario(127);
        $informe = Informe::where('inf_codigo', 127)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    /**
     * [informeGerencialCapacitaciones description]
     * @return Application|Factory|View [type] [description]
     */
    public function informeGerencialCapacitaciones()
    {
        if (!Gate::allows('capacitaciones_informe_gerencial')) {
            abort(401);
        }
        $campos = InformeCampo::formulario(96);
        $informe = Informe::where('inf_codigo', 96)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialEvaluaciones()
    {
        if (!Gate::allows('calidad_gestionar_evaluaciones_informe_gerencial')) {
            abort(401);
        }
        $campos = InformeCampo::formulario(103);
        $informe = Informe::where('inf_codigo', 103)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialLogisticaRutas()
    {
        if (!Gate::allows('logistica_productividad_rutas_informe_gerencial')) {
            abort(401);
        }
        $campos = InformeCampo::formulario(127);
        $informe = Informe::where('inf_codigo', 127)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }


    public function informeGerencialFacturacion()
    {
        if (!Gate::allows('contabilidad_facturacion_informe_gerencial')) {
            abort(401);
        }

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

    /**
     * Respuesta de la tabla para el informe, dependiendo de los filtros
     * @param  Request $request petición con los filtros
     * @return RespuestaInforme          respuesta con el html de la tabla
     */
    public function envio(Request $request): RespuestaInforme
    {
        return new RespuestaInforme();
    }

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

            if ($validator->fails()) {
                return response()->json(["error"=>$validator->messages()->first(), "success"=>""], 200);
            }

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

    /**
     * [informeGerencialCapacitaciones description]
     * @return [type] [description]
     */
    public function informeGerencialFacturas()
    {
        if (!Gate::allows('administracion_controlFacturas_informe')) abort(401);

        $campos = InformeCampo::formulario(55);
        $informe = Informe::where('inf_codigo', 55)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    /**
     * [informeGerencialEnvios description]
     * @return [type] [description]
     */
    public function informeGerencialEnvios()
    {
        if (!Gate::allows('logisitca_envios_informe_gerencial')) abort(401);

        $campos = InformeCampo::formulario(134);
        $informe = Informe::where('inf_codigo', 134)->first();
        $remitente = $this->remitentesPorusuario();

        view()->share('empresas', collect());
        view()->share('remitente', $remitente);
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialClientes()
    {
        if (!Gate::allows('administracion_clientes_informe_gerencial')) abort(401);

        $campos = InformeCampo::formulario(135);
        $informe = Informe::where('inf_codigo', 135)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialPolizas()
    {
        if (!Gate::allows('informe_gerencial_poliza')) abort(401);

        $campos = InformeCampo::formulario(136);
        $informe = Informe::where('inf_codigo', 136)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialVehiculos()
    {
        if (!Gate::allows('informe_gerencial_vehiculos')) abort(401);

        $campos = InformeCampo::formulario(137);
        $informe = Informe::where('inf_codigo', 137)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }
    public function informeGerencialContratos()
    {
        if (!Gate::allows('informe_gerencial_contratos')) abort(401);

        $campos = InformeCampo::formulario(138);
        $informe = Informe::where('inf_codigo', 138)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function remitentesPorUsuario(){

        $remitentes = DB::table('logistica_binoc.clientexsucursal')
                         ->join('logistica_binoc.cliente_remitentes', 'cliente_remitentes.id', '=', 'clientexsucursal.remitente_id')
                         ->join('logistica_binoc.cliente_remitentexsucursalxusuario', 
                                'cliente_remitentexsucursalxusuario.cliente_sucursal_id', '=', 'clientexsucursal.id')
                         ->join('public.usuarios', 'usuarios.usu_codigo', '=', 'cliente_remitentexsucursalxusuario.usu_codigo')
                         ->select(DB::raw("CONCAT(clientexsucursal.descripcion, ' - ', cliente_remitentes.nombre) as nombre"), 'clientexsucursal.id')
                         ->where('cliente_remitentes.estado', 'true')
                         ->where('clientexsucursal.estado', 'true')
                         ->where('usuarios.usu_codigo', auth()->user()->usu_codigo)
                         ->where('usuarios.usu_actividad', 'true')
                         ->where('cliente_remitentexsucursalxusuario.deleted_at', '=', null)
                         ->get()
                         ->pluck('nombre', 'id');

        $remitente = json_decode($remitentes, true);
        return $remitente;
    }

    public function informeGerencialMttos()
    {
        $campos = InformeCampo::formulario(139);
        $informe = Informe::where('inf_codigo', 139)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialCaracterizacion()
    {

        $campos = InformeCampo::formulario(140);
        $informe = Informe::where('inf_codigo', 140)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialUsuarios()
    {
        if (!Gate::allows('informe_gerencial_usuarios')) abort(401);

        $campos = InformeCampo::formulario(16);
        $informe = Informe::where('inf_codigo', 16)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialPasajes()
    {
        if (!Gate::allows('gerencial_pasajes')) abort(401);

        $campos = InformeCampo::formulario(26);
        $informe = Informe::where('inf_codigo', 26)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialVentasPasajes()
    {
        if (!Gate::allows('gerencial_pasajes')) abort(401);

        $campos = InformeCampo::formulario(141);
        $informe = Informe::where('inf_codigo', 141)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialDocumentoSoporte()
    {
        if (!Gate::allows('contabilidad_informe_gerencial_documento_soporte')) abort(401);

        $campos = InformeCampo::formulario(142);
        $informe = Informe::where('inf_codigo', 142)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialEventos()
    {
        if (!Gate::allows('informe_gerencial_eventos')) abort(401);

        $campos = InformeCampo::formulario(143);
        $informe = Informe::where('inf_codigo', 143)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerenciaEnvios()
    {
        if (!Gate::allows('contabilidad_informe_gerencial_envios')) abort(401);

        $campos = InformeCampo::formulario(144);
        $informe = Informe::where('inf_codigo', 144)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialComprasInfra()
    {
        if (!Gate::allows('informe_gerencial_compras_infra')) abort(401);

        $campos = InformeCampo::formulario(145);
        $informe = Informe::where('inf_codigo', 145)->first();
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    public function informeGerencialDocumentosDigitales()
    {
        if (!Gate::allows('informe_gerencial_documentos_digitales')) abort(401);

        $informe = Informe::where('inf_codigo', 146)->first();
        $campos = InformeCampo::formulario(146);
        view()->share('empresas', collect());
        return view('informe', compact('campos', 'informe'));
    }

    // ====================================================================

    public function informeGerencialInventarioBinoc()
    {
        if (!Gate::allows('informe_gerencial_inventario_binoc'))
        {
            abort(401);
        }

        $campos = InformeCampo::formulario(147);
        $informe = Informe::where('inf_codigo', 147)->first();
        $clientes_inventario = $this->clientesInventario();
        $clientes_referencia = $this->consultaClientesInventario();

        // =========================================================

        $clientes_asignados_x_usuario = auth()->user()->clientes_usuario;

       if ($clientes_asignados_x_usuario->count() === 1) {
            $emp = $clientes_asignados_x_usuario->first();
            session()->put('cli_codigo',$emp->cli_codigo);
            session()->put('cli_descripcion',$emp->cli_descripcion);
        }

        $usu_clientes = $clientes_asignados_x_usuario->pluck('cli_descripcion','cli_codigo');//para el select
        view()->share('clientes_referencia', $usu_clientes);

        // =========================================================

        view()->share('empresas', collect());
        view()->share('clientes_inventario', $clientes_inventario);
        return view('informe', compact('campos', 'informe'));
    }

    // ====================================================================

    public function clientesInventario()
    {
        $clientes_inventario_ref = DB::table('logistica_binoc.referencias')
                         ->join('logistica.clientes', 'clientes.cli_codigo', '=', 'referencias.cli_codigo')
                         ->join('logistica_binoc.inventario', 'inventario.ref_codigo', '=', 'referencias.ref_codigo')
                         ->join('public.usuarios', 'usuarios.usu_codigo', '=', 'inventario.usu_ing_codigo')
                         ->select('clientes.cli_codigo','clientes.cli_descripcion','usuarios.usu_codigo','usuarios.emp_codigo')
                         ->where('usuarios.usu_codigo', auth()->user()->usu_codigo)
                         ->where('usuarios.usu_actividad', 'true')
                         ->get()
                         ->first();

        return $clientes_inventario_ref;
    }

    // ====================================================================

    public function consultaClientesInventario()
    {
        $consulta_clientes_referencia = Cliente::select('cli_codigo','cli_descripcion')->orderBy('cli_descripcion', 'ASC')->pluck('cli_descripcion', 'cli_codigo');

        $clientes_referencia = $consulta_clientes_referencia;
        return $clientes_referencia;
    }

    public function informeGerencialTickets()
    {
        try {
            if (!Gate::allows('sistemas_gestion_tickets')) abort(401);

            $informe = Informe::where('inf_codigo', 9)->first();
            $campos = InformeCampo::formulario(9);
            view()->share('empresas', collect());
            return view('informe', compact('campos', 'informe'));
        } catch (Exception $e) {
            dd($e);
        }
    }
    
}
