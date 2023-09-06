<?php

namespace App\Http\Controllers\cliente_potencial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Exception;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use App\Models\TipoDocumento;
use App\Models\Ciudad;
use App\Models\TipoInmueble;
use App\Models\TipoPersona;
use App\Models\IndicadorNumerico;
use App\Models\ReferidoPor;
use App\Models\RedSocial;
use App\Models\SiNo;
use App\Models\DirigidoA;
use App\Models\Cliente;
use App\Http\Responsable\cliente_potencial\ClientePotencialStore;
use App\Http\Responsable\cliente_potencial\ClienteUpdate;

class ClientePotencialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // try {
        //     $sesion = $this->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) &&
        //         empty($sesion[3]) || is_null($sesion[3]) && $sesion[3] != true)
        //     {
        //         return redirect()->to(route('login'));
        //     } else {
                // $clientes = Cliente::all()->toArray();
                $clientes = $this->consultarClientes();
                // dd($clientes);

                $this->shareData();
                return view('cliente_potencial.index', compact('clientes'));
        //     }
        // } catch (Exception $e) {
        //     // dd($e);
        //     alert()->error("Ha ocurrido un error!");
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // try {
        //     $sesion = $this->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) &&
        //         empty($sesion[3]) || is_null($sesion[3]) && $sesion[3] != true)
        //     {
        //         return redirect()->to(route('inicio_sesion.login'));
        //     } else {
                $this->shareData();
                return view('cliente_potencial.create');
        //     }
        // } catch (Exception $e) {
        //     // dd($e);
        //     alert()->error("Ha ocurrido un error!");
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new ClientePotencialStore();
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->consultarClienteIndividual($id);
        $this->shareData();
        return view('cliente_potencial.cliente_historial', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        // $cliente = $this->consultarClienteIndividual($id);
        // $this->shareData();
        // return view('cliente_potencial.cliente_historial', compact('cliente'));
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
        return new ClienteUpdate();
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
    
    private function shareData()
    {
        view()->share('tipo_documento', TipoDocumento::orderBy('decripcion_documento', 'asc')->pluck('decripcion_documento', 'id_tipo_documento'));
        view()->share('tipo_inmueble', TipoInmueble::orderBy('tipo_inmueble', 'asc')->pluck('tipo_inmueble', 'id_tipo_inmueble'));
        view()->share('tipo_persona', TipoPersona::orderBy('tipo_persona', 'asc')->pluck('tipo_persona', 'id_tipo_persona'));
        view()->share('dirigido_a', DirigidoA::orderBy('dirigido_a', 'asc')->pluck('dirigido_a', 'id_dirigido_a'));
        view()->share('ciudad', Ciudad::orderBy('descripcion_ciudad', 'asc')->pluck('descripcion_ciudad', 'id_ciudad'));
        view()->share('indicador_numerico', IndicadorNumerico::orderBy('id_indicador_numerico', 'asc')->pluck('indicador_numerico', 'id_indicador_numerico'));
        view()->share('referido_por', ReferidoPor::orderBy('referido_por', 'asc')->pluck('referido_por', 'id_referido_por'));
        view()->share('red_social', RedSocial::orderBy('red_social', 'asc')->pluck('red_social', 'id_red_social'));
        view()->share('si_no', SiNo::orderBy('id_si_no', 'asc')->pluck('descripcion_si_no', 'id_si_no'));

    }

    // ========================================================

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

    // ========================================================
    
    public function consultarClientes()
    {
        return DB::table('clientes')
                ->leftjoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                ->leftjoin('dirigido_a', 'dirigido_a.id_dirigido_a', '=', 'clientes.id_dirigido_a')
                ->leftjoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'clientes.id_doc_empresa')
                ->leftjoin('ciudad', 'ciudad.id_ciudad', '=', 'clientes.id_ciudad')
                ->leftjoin('tipo_inmueble', 'tipo_inmueble.id_tipo_inmueble', '=', 'clientes.id_tipo_inmueble')
                ->leftjoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
                ->leftjoin('si_no', 'si_no.id_si_no', '=', 'clientes.id_visitado')
                ->select('id_cliente',
                            'cli_nombres',
                            'cli_celular',
                            'cli_email',
                            'clientes.id_tipo_persona',
                            'tipo_persona',
                            'dirigido_a',
                            'decripcion_documento',
                            'documento_empresa',
                            'objeto_avaluo',
                            'descripcion_ciudad',
                            'tipo_inmueble',
                            'valor_cotizacion',
                            'referido_por',
                            'descripcion_si_no',
                        )
                ->whereNull('dirigido_a.deleted_at')
                ->get();
    }

    // ========================================================
    
    public function consultarClienteIndividual($idcliente)
    {
        return DB::table('clientes')
                ->leftjoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                ->leftjoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'clientes.id_doc_cliente')
                ->select(   'id_cliente',
                            'cli_nombres',
                            'id_doc_cliente',
                            'decripcion_documento',
                            'documento_cliente',
                            'cli_celular',
                            'cli_email',
                            'clientes.id_tipo_persona',
                            'tipo_persona',
                        )
                ->where('id_cliente', $idcliente)
                ->whereNull('clientes.deleted_at')
                ->first();
    }

    // ========================================================

    public function validarVariablesSesion()
    {
        // $variablesSesion =[];

        // $idUsuario = session('id_usuario');
        // array_push($variablesSesion, $idUsuario);

        // $username = session('usuario');
        // array_push($variablesSesion, $username);

        // $rolUsuario = session('id_rol');
        // array_push($variablesSesion, $rolUsuario);

        // $sesionIniciada = session('sesion_iniciada');
        // array_push($variablesSesion, $sesionIniciada);

        // return $variablesSesion;
    }

    
}