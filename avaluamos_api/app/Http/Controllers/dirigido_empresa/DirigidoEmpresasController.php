<?php

namespace App\Http\Controllers\dirigido_empresa;

use App\Http\Controllers\Controller;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaEdit;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaIndex;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaStore;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaUpdate;
use App\Models\DirigidoA;
use Exception;
use Illuminate\Http\Request;


class DirigidoEmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DirigidoEmpresaIndex();
    }

    // ======================================================================
    // ======================================================================

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // ======================================================================
    // ======================================================================

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

    // ======================================================================
    // ======================================================================

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idDirigidoA
     * @return \Illuminate\Http\Response
     */
    public function edit($idDirigidoA)
    {
        return new DirigidoEmpresaEdit($idDirigidoA);
    }

    // ======================================================================
    // ======================================================================

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idDirigidoA
     * @return \Illuminate\Http\Response
     */
    public function update($idDirigidoA)
    {
        return new DirigidoEmpresaUpdate($idDirigidoA);
    }

    // ======================================================================
    // ======================================================================

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

    // ======================================================================
    // ======================================================================

    public function dirigidoEmpresaConsultar(Request $request)
    {
        $idTipoDocumento = $request->input('id_tipo_documento');
        $numeroDocumento = $request->input('numero_documento');

        try {
            $validarEmpresa = DirigidoA::select(
                    'id_dirigido_a',
                    'dirigido_a',
                    'id_tipo_documento',
                    'numero_documento'
                )
                ->whereNull('deleted_at')
                ->where('id_tipo_documento', $idTipoDocumento)
                ->where('numero_documento', $numeroDocumento)
                ->first();

            if (isset($validarEmpresa) && ! is_null($validarEmpresa) && ! empty($validarEmpresa)) {
                return response()->json('existe_empresa');
            }

            return response()->json('no_existe_empresa');
        } catch (Exception $e) {
            return response()->json('error_exception');
        }
    }
}
