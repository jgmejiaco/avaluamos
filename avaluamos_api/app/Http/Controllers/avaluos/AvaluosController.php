<?php

namespace App\Http\Controllers\avaluos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Http\Responsable\avaluos\AvaluoIndex;
use App\Http\Responsable\avaluos\AvaluoEdit;
use App\Http\Responsable\avaluos\AvaluoVisitaCreateCliente;
use App\Http\Responsable\avaluos\AvaluoConsultarEmpresa;
use App\Http\Responsable\avaluos\AvaluoConsultarFactorPendiente;
use App\Http\Responsable\avaluos\AvaluoConsultarFactorUbicacion;


class AvaluosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AvaluoIndex();
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
        //
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
        return new AvaluoEdit($idVisita);
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
        //
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

    public function avaluoVisitaCreateCliente($idVisita)
    {
        return new AvaluoVisitaCreateCliente($idVisita);
    }

     // ======================================================================
    // ======================================================================
    
    public function avaluoConsultarEmpresa($idEmpresa)
    {
        return new AvaluoConsultarEmpresa($idEmpresa);
    }
    
    // ======================================================================
    // ======================================================================

    public function avaluoConsultarFactorPendiente()
    {
        return new AvaluoConsultarFactorPendiente();
    }

    // ======================================================================
    // ======================================================================

    public function avaluoConsultarFactorUbicacion()
    {
        return new AvaluoConsultarFactorUbicacion();
    }

    // ======================================================================
    // ======================================================================

    // public function avaluoVisitaTecnicaUpdate($idVisita)
    // {
    //     return new AvaluoVisitaTecnicaUpdate($idVisita);
    // }

    // ======================================================================
    // ======================================================================

    // public function avaluoInfoInmuebleUpdate($idVisita)
    // {
    //     return new AvaluoInfoInmuebleUpdate($idVisita);
    // }

    // ======================================================================
    // ======================================================================

    // public function avaluoCaracteristicasInmuebleUpdate($idVisita)
    // {
    //     return new AvaluoCaracteristicasInmuebleUpdate($idVisita);
    // }

    // ======================================================================
    // ======================================================================

    // public function avaluoAcabadosInmuebleUpdate($idVisita)
    // {
    //     return new AvaluoAcabadosInmuebleUpdate($idVisita);
    // }

    // ======================================================================
    // ======================================================================

    // public function avaluoCalificacionInmuebleUpdate($idVisita)
    // {
    //     return new AvaluoCalificacionInmuebleUpdate($idVisita);
    // }

    // ======================================================================
    // ======================================================================

    // public function avaluoDotacionComunalUpdate($idVisita)
    // {
    //     return new AvaluoDotacionComunalUpdate($idVisita);
    // }

    // ======================================================================
    // ======================================================================

    // public function avaluoInfoSectorUpdate($idVisita)
    // {
    //     return new AvaluoInfoSectorUpdate($idVisita);
    // }

    // ======================================================================
    // ======================================================================

    // public function avaluoCondiUrbanisticasUpdate($idVisita)
    // {
    //     return new AvaluoCondiUrbanisticasUpdate($idVisita);
    // }

    // ======================================================================
    // ======================================================================

    // public function avaluoEstadoConservacionUpdate($idVisita)
    // {
    //     return new AvaluoEstadoConservacionUpdate($idVisita);
    // }

    // ======================================================================
    // ======================================================================

    // public function avaluoObserGeneralesUpdate($idVisita)
    // {
    //     return new AvaluoObserGeneralesUpdate($idVisita);
    // }

    // ======================================================================
    // ======================================================================

    // public function avaluoRegFotograficoUpdate($idVisita)
    // {
    //     return new AvaluoRegFotograficoUpdate($idVisita);
    // }

    // ======================================================================
    // ======================================================================

    // public function avaluoValorEstimadoUpdate($idVisita)
    // {
    //     return new AvaluoValorEstimadoUpdate($idVisita);
    // }

    // ======================================================================
    // ======================================================================

}
