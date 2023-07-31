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
use App\Models\TipoInmueble;
use App\Models\TipoPersona;

class ClientePotencialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try 
        {
            // Si el usuario no esta autenticado, redireccionamos al login
            // if (!Auth::check()) {
            //     return redirect()->to(route('login'));
            //     exit;
            // }
            
            // if (! Gate::allows('compras_mtto_cronograma')) {
            //     return abort(401);
            // }

            // $sesion = $this->validarVariablesSesion();

            // if(empty($sesion[0]) || is_null($sesion[0]) &&
            //    empty($sesion[1]) || is_null($sesion[1]) &&
            //    empty($sesion[2]) || is_null($sesion[2]) &&
            //    empty($sesion[3]) || is_null($sesion[3]) &&
            //    $sesion[2] != true)
            // {
            //     return redirect()->to(route('home'));
            // } else {

            //     $this->share_data();
            //     return view('administrador.index');
            // }
            // $this->share_data();
            return view('cliente_potencial.index');
            
        } catch (Exception $e) {
            dd($e);
            alert()->error("Ha ocurrido un error!");
            // return redirect()->to(route('home'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->share_data();
        return view('cliente_potencial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
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
    
    private function share_data()
    {
        view()->share('tipo_documento', TipoDocumento::orderBy('decripcion_documento', 'asc')->pluck('decripcion_documento', 'id_tipo_documento'));
        view()->share('tipo_inmueble', TipoInmueble::orderBy('tipo_inmueble', 'asc')->pluck('tipo_inmueble', 'id_tipo_inmueble'));
        view()->share('tipo_persona', TipoPersona::orderBy('tipo_persona', 'asc')->pluck('tipo_persona', 'id_tipo_persona'));
        // view()->share('pais', Pais::orderBy('descripcion_pais', 'asc')->pluck('descripcion_pais', 'id_pais'));
        // view()->share('departamento_estado', DepartamentoEstado::orderBy('descripcion_departamento', 'asc')->pluck('descripcion_departamento', 'id_departamento_estado'));
        // view()->share('ciudad', Ciudad::orderBy('descripcion_ciudad', 'asc')->pluck('descripcion_ciudad', 'id_ciudad'));
        // view()->share('tipo_vivienda', TipoVivienda::orderBy('tipo_vivienda', 'asc')->pluck('tipo_vivienda', 'id_tipo_vivienda'));
        // view()->share('uso_inmueble', UsoInmueble::orderBy('uso_inmueble', 'asc')->pluck('uso_inmueble', 'id_uso_inmueble'));
        // view()->share('indicador_numerico', IndicadorNumerico::orderBy('id_indicador_numerico', 'asc')->pluck('indicador_numerico', 'id_indicador_numerico'));
        // view()->share('si_no', SiNo::orderBy('id_si_no', 'asc')->pluck('descripcion_si_no', 'id_si_no'));
        // view()->share('', ::orderBy('', 'asc')->pluck('', ''));
        // view()->share('usuarios', $this->todosLosUsuarios());
    }

    // ========================================================

    public function consultarMttoInfraestructura()
    {
    
    }

    // ========================================================

    
}