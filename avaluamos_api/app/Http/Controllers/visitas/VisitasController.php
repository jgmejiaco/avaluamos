<?php

namespace App\Http\Controllers\visitas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Http\Responsable\visitas\VisitaIndex;
use App\Http\Responsable\visitas\VisitaCreateCliente;
use App\Http\Responsable\visitas\VisitaStore;
use App\Http\Responsable\visitas\VisitaEdit;
use App\Http\Responsable\visitas\VisitaUpdate;
use App\Http\Responsable\visitas\VisitaConsultarEmpresa;
use App\Http\Responsable\visitas\VisitaDireccionConsultaPredio;
use App\Http\Responsable\visitas\VisitaConsultarFactorPendiente;
use App\Http\Responsable\visitas\VisitaConsultarFactorUbicacion;
use App\Http\Responsable\visitas\VisitaStoreConsultaPredio;


class VisitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new VisitaIndex();
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
        return new VisitaStore();
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
     * @param  int  $idVisita
     * @return \Illuminate\Http\Response
     */
    public function edit($idVisita)
    {
        return new VisitaEdit($idVisita);
    }

    // ======================================================================
    // ======================================================================

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idVisita
     * @return \Illuminate\Http\Response
     */
    public function update($idVisita)
    {
        return new VisitaUpdate($idVisita);
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

    public function visitaCreateCliente($idCliente)
    {
        return new VisitaCreateCliente($idCliente);
    }

    // ======================================================================
    // ======================================================================
    
    public function visitaConsultarEmpresa($idEmpresa)
    {
        return new VisitaConsultarEmpresa($idEmpresa);
    }
    

    // ======================================================================
    // ======================================================================

    public function visitaDireccionConsultaPredio()
    {
        return new VisitaDireccionConsultaPredio();
    }
    
    // ======================================================================
    // ======================================================================
      
    public function visitaConsultarFactorPendiente()
    {
        return new VisitaConsultarFactorPendiente();
    }

    // ======================================================================
    // ======================================================================

    public function visitaConsultarFactorUbicacion()
    {
        return new VisitaConsultarFactorUbicacion();
    }

    // ======================================================================
    // ======================================================================

    public function visitaStoreConsultaPredio()
    {
        return new VisitaStoreConsultaPredio();
    }

    // ======================================================================
    // ======================================================================

}
