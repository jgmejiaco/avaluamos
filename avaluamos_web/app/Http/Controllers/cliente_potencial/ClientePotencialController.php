<?php

namespace App\Http\Controllers\cliente_potencial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\admin\AdministradorController;
use Exception;
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
        try {
            $adminCtrl = new AdministradorController();
            $sesion = $adminCtrl->validarVariablesSesion();

            if (empty($sesion[0]) || is_null($sesion[0]) &&
                empty($sesion[1]) || is_null($sesion[1]) &&
                empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
            {
                return view('inicio_sesion.login');
            } else {
                $clientes = $this->consultarClientes();
                $this->shareData();
                return view('cliente_potencial.index', compact('clientes'));
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('login'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
                return view('cliente_potencial.create');
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('login'));
        }
    }

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
                return new ClientePotencialStore();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
                $cliente = $this->consultarClienteIndividual($id);
                $this->shareData();
                return view('cliente_potencial.cliente_historial', compact('cliente'));
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('login'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idCliente)
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
                $cliente = $this->consultarClienteIndividual($idCliente);

                if ($cliente) {
                    if (isset($cliente->fecha_nacimiento) && !is_null($cliente->fecha_nacimiento) && !empty($cliente->fecha_nacimiento) ) {
                        $cliente->fecha_nacimiento = date('Y-m-d', $cliente->fecha_nacimiento);
                    } else {
                        $cliente->fecha_nacimiento = null;
                    }
                }

                $this->shareData();
                return view('cliente_potencial.edit', compact('cliente'));
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('login'));
        }
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
        try {
            $adminCtrl = new AdministradorController();
            $sesion = $adminCtrl->validarVariablesSesion();

            if (empty($sesion[0]) || is_null($sesion[0]) &&
                empty($sesion[1]) || is_null($sesion[1]) &&
                empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
            {
                return view('inicio_sesion.login');
            } else {
                return new ClienteUpdate();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('login'));
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
                ->leftjoin('usuarios', 'usuarios.id_usuario', '=', 'clientes.usu_logueado')
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
                            'empresa_que_refiere',
                            'usuarios.nombre_usuario',
                        )
                ->whereNull('clientes.deleted_at')
                ->orderBy('clientes.id_cliente', 'DESC')
                ->get();
    }

    // ========================================================
    
    public function consultarClienteIndividual($idcliente)
    {
        return DB::table('clientes')
                ->leftjoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'clientes.id_doc_cliente')
                ->leftjoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                ->leftjoin('pais', 'pais.id_pais', '=', 'clientes.id_pais')
                ->leftjoin('departamento_estado', 'departamento_estado.id_departamento_estado', '=', 'clientes.id_dpto_estado')
                ->leftjoin('ciudad', 'ciudad.id_ciudad', '=', 'clientes.id_ciudad')
                ->leftjoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
                ->leftjoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
                ->select(   'id_cliente',
                            'cli_nombres',
                            'id_doc_cliente',
                            'decripcion_documento',
                            'documento_cliente',
                            'fecha_nacimiento',
                            'cli_celular',
                            'cli_email',
                            'clientes.id_tipo_persona',
                            'tipo_persona',
                            'clientes.id_pais',
                            'clientes.id_dpto_estado',
                            'clientes.id_ciudad',
                            'clientes.id_referido_por',
                            'clientes.id_red_social',
                            'nombre_quien_refiere',
                            'empresa_que_refiere',
                        )
                ->where('id_cliente', $idcliente)
                ->whereNull('clientes.deleted_at')
                ->first();
    }

    // ========================================================
    
    public function verificarCelular()
    {
        $cliCelular = request('cliCelular', null);

        try {
            $verificarCliCelular = Cliente::select('cli_celular')
                                    ->where('cli_celular', $cliCelular)
                                    ->first();

            if(isset($verificarCliCelular) && !is_null($verificarCliCelular) && !empty($verificarCliCelular)) {
                return response()->json('existe_cli_celular');
            } else {
                return response()->json('no_existe_cli_celular');
            }
        } catch (Exception $e) {
            return response()->json("error_exception");
        }
    }
}