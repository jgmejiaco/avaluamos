<?php

namespace App\Http\Controllers\dirigido_empresa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaIndex;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaStore;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaEdit;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaUpdate;
use Illuminate\Support\Facades\Hash;
use App\Models\DirigidoEmpresa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


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

    

    // ======================================================================
    // ======================================================================

    

    // ======================================================================
    // ======================================================================

    
    // ======================================================================
    // ======================================================================

   
}
