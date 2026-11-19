<?php

namespace App\Http\Controllers\dirigido_empresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\TipoDocumento;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaIndex;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaStore;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaEdit;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaUpdate;
use App\Models\DirigidoA;

class DirigidoEmpresaController extends Controller
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
    public function index(Request $request)
    {
        try {

            return new DirigidoEmpresaIndex();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
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
            return new DirigidoEmpresaStore();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
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
     * El resource usa el parámetro {dirigido_empresa}.
     *
     * @param  int  $idDirigidoA
     * @return \Illuminate\Http\Response
     */
    public function edit($idDirigidoA)
    {
        try {
            return new DirigidoEmpresaEdit($idDirigidoA);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error al editar la empresa.");
            return redirect()->to(route('dirigido_empresa.index'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idDirigidoA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idDirigidoA)
    {
        try {
            return new DirigidoEmpresaUpdate($idDirigidoA);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
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
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            return response()->json("error_exception");
        }
    }
}
