<?php

namespace App\Http\Controllers\cliente_potencial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\admin\AdministradorController;
use Exception;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use App\Models\Cliente;
use App\Models\TipoDocumento;
use App\Models\TipoPersona;
use App\Models\Pais;
use App\Models\DepartamentoEstado;
use App\Models\Ciudad;
use App\Models\ReferidoPor;
use App\Models\RedSocial;
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
        //      $adminCtrl = new AdministradorController();
        //      $sesion = $adminCtrl->validarVariablesSesion();

        //      if (empty($sesion[0]) || is_null($sesion[0]) &&
        //          empty($sesion[1]) || is_null($sesion[1]) &&
        //          empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //      {
        //          return redirect()->to(route('login'));
        //     } else {
                    // $clientes = Cliente::all()->toArray();
                    $clientes = $this->consultarClientes();
                    $this->shareData();
                    return view('cliente_potencial.index', compact('clientes'));
        //     }
        // } catch (Exception $e) {
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
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
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
        view()->share('tipo_persona', TipoPersona::orderBy('tipo_persona', 'asc')->pluck('tipo_persona', 'id_tipo_persona'));
        view()->share('paises', Pais::orderBy('descripcion_pais', 'asc')->pluck('descripcion_pais', 'id_pais'));
        view()->share('departamentos', DepartamentoEstado::orderBy('descripcion_departamento', 'asc')->pluck('descripcion_departamento', 'id_departamento_estado'));
        view()->share('ciudades', Ciudad::orderBy('descripcion_ciudad', 'asc')->pluck('descripcion_ciudad', 'id_ciudad'));
        view()->share('referido_por', ReferidoPor::orderBy('referido_por', 'asc')->pluck('referido_por', 'id_referido_por'));
        view()->share('red_social', RedSocial::orderBy('red_social', 'asc')->pluck('red_social', 'id_red_social'));
    }

    // ========================================================

    
    public function consultarClientes()
    {
        return DB::table('clientes')
                ->leftjoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'clientes.id_doc_cliente')
                ->leftjoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                ->leftjoin('pais', 'pais.id_pais', '=', 'clientes.id_pais')
                ->leftjoin('departamento_estado', 'departamento_estado.id_departamento_estado', '=', 'clientes.id_dpto_estado')
                ->leftjoin('ciudad', 'ciudad.id_ciudad', '=', 'clientes.id_ciudad')
                ->leftjoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
                ->leftjoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
                ->select('id_cliente',
                            'cli_nombres',
                            'id_doc_cliente',
                            'decripcion_documento',
                            'documento_cliente',
                            'fecha_nacimiento',
                            'cli_celular',
                            'cli_email',
                            'clientes.id_tipo_persona',
                            'tipo_persona',
                            'pais.id_pais',
                            'descripcion_pais',
                            'departamento_estado.id_departamento_estado',
                            'descripcion_departamento',
                            'ciudad.id_ciudad',
                            'descripcion_ciudad',
                            'referido_por.id_referido_por',
                            'referido_por',
                            'redes_sociales.id_red_social',
                            'red_social',
                            'nombre_quien_refiere',
                            'empresa_que_refiere'
                        )
                ->whereNull('clientes.deleted_at')
                ->orderBy('clientes.id_cliente', 'DESC')
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