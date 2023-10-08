<?php

namespace App\Http\Controllers\dirigido_empresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\TipoDocumento;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaStore;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaUpdate;
use App\Models\DirigidoA;
use App\Http\Controllers\admin\AdministradorController;

class DirigidoEmpresaController extends Controller
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
                $empresas = $this->consultarEmpresasIndex();
                return view('dirigido_empresa.index', compact('empresas'));
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
        try {
            $adminCtrl = new AdministradorController();
            $sesion = $adminCtrl->validarVariablesSesion();

            if (empty($sesion[0]) || is_null($sesion[0]) &&
                empty($sesion[1]) || is_null($sesion[1]) &&
                empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
            {
                return view('inicio_sesion.login');
            } else {
                return new DirigidoEmpresaStore();
            }
        } catch (Exception $e) {
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('login'));
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
                return new DirigidoEmpresaUpdate();
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
    }

    // ========================================================

    public function consultarEmpresasIndex()
    {
        return DB::table('dirigido_a')
                    ->leftjoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'dirigido_a.id_tipo_documento')
                    ->leftjoin('usuarios', 'usuarios.id_usuario', '=', 'dirigido_a.usu_logueado')
                    ->select('dirigido_a.id_dirigido_a',
                                'dirigido_a.dirigido_a',
                                'dirigido_a.numero_documento',
                                'tipo_documento.id_tipo_documento',
                                'tipo_documento.decripcion_documento',
                                'tipo_documento.decripcion_documento',
                                'usuarios.nombre_usuario',
                                )
                    ->whereNull('dirigido_a.deleted_at')
                    ->orderBy('dirigido_a.dirigido_a', 'ASC')
                    ->get();
    }

    // ========================================================
    
    public function validarEmpresa(Request $request)
    {
        $idTipoDocumento = request('id_tipo_documento', null);
        $numeroDocumento = request('numero_documento', null);

        try {
            $validarEmpresa = DirigidoA::select('id_dirigido_a',
                                                'dirigido_a',
                                                'id_tipo_documento',
                                                'numero_documento')
                                        ->whereNull('deleted_at')
                                        ->where('id_tipo_documento', $idTipoDocumento)
                                        ->where('numero_documento', $numeroDocumento)
                                        ->first();

            if(isset($validarEmpresa) && !is_null($validarEmpresa) && !empty($validarEmpresa)) {
                return response()->json('existe_empresa');
            } else {
                return response()->json('no_existe_empresa');
            }

        } catch (Exception $e) {
            return response()->json("error_exception");
        }
    }
}
