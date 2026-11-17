<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Cargo;
use App\Models\TipoDocumento;
use App\Models\Ciudad;
use App\Models\Estado;
use App\Http\Responsable\admin\UsuarioStore;
use App\Http\Responsable\admin\UsuarioUpdate;

class AdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('compartirShareData');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('administrador.index');

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
        }
    }

    // ==========================================================================

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('administrador.create');

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
        }
    }

    // ==========================================================================

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            return new UsuarioStore();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
        }
    }

    // ==========================================================================

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    // ==========================================================================

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    // ==========================================================================

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            return new UsuarioUpdate();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
        }
    }

    // ==========================================================================

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    // ==========================================================================


    public function verificarDocumento()
    {
        $usuidTipoDocumento = request('usuidTipoDocumento', null);
        $usuNumeroDocumento = request('usuNumeroDocumento', null);

        try {
            $verificarDocumento = Usuario::select('id_tipo_documento', 'numero_documento')
                        ->where('id_tipo_documento', $usuidTipoDocumento)
                        ->where('numero_documento', $usuNumeroDocumento)
                        ->first();

            if(isset($verificarDocumento) && !is_null($verificarDocumento) && !empty($verificarDocumento)) {
                return response()->json('existe_documento');
            } else {
                return response()->json('no_existe_documento');
            }
        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            return response()->json("error_exception");
        }
    }
}

