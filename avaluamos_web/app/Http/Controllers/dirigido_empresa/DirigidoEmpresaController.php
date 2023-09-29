<?php

namespace App\Http\Controllers\dirigido_empresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Exception;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use App\Models\TipoDocumento;
use App\Models\SiNo;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaStore;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaUpdate;
use App\Models\DirigidoA;

class DirigidoEmpresaController extends Controller
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
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return redirect()->to(route('login'));
        //     } else {
                $this->shareData();
                $empresas = $this->consultarEmpresasIndex();
                return view('dirigido_empresa.index', compact('empresas'));
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
        //         empty($sesion[2]) || is_null($sesion[2]) && !$sesion[3])
        //     {
        //         return redirect()->to(route('inicio_sesion.login'));
        //     } else {
                // $this->shareData();
                // return view('dirigido_empresa.create');
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
        return new DirigidoEmpresaStore();
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
        // dd($request);
        return new DirigidoEmpresaUpdate();
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
                    ->select('dirigido_a.id_dirigido_a',
                                'dirigido_a.dirigido_a',
                                'dirigido_a.numero_documento',
                                'tipo_documento.id_tipo_documento',
                                'tipo_documento.decripcion_documento',
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

        // dd($idTipoDocumento, $numeroDocumento);

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