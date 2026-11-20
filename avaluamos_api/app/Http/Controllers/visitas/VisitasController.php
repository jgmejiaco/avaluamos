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
use App\Http\Responsable\visitas\update\VisitaTecnicaUpdate;
use App\Http\Responsable\visitas\update\VisitaInfoInmuebleUpdate;
use App\Http\Responsable\visitas\update\VisitaCaracteristicasInmuebleUpdate;
use App\Http\Responsable\visitas\update\VisitaAcabadosInmuebleUpdate;
use App\Http\Responsable\visitas\update\VisitaCalificacionInmuebleUpdate;
use App\Http\Responsable\visitas\update\VisitaDotacionComunalUpdate;
use App\Http\Responsable\visitas\update\VisitaInfoSectorUpdate;
use App\Http\Responsable\visitas\update\VisitaCondiUrbanisticasUpdate;
use App\Http\Responsable\visitas\update\VisitaEstadoConservacionUpdate;
use App\Http\Responsable\visitas\update\VisitaObserGeneralesUpdate;
use App\Http\Responsable\visitas\update\VisitaRegFotograficoUpdate;
use App\Http\Responsable\visitas\update\VisitaValorEstimadoUpdate;


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

    public function visitaTecnicaUpdate($idVisita)
    {
        return new VisitaTecnicaUpdate($idVisita);
    }

    // ======================================================================
    // ======================================================================

    public function visitaInfoInmuebleUpdate($idVisita)
    {
        return new VisitaInfoInmuebleUpdate($idVisita);
    }

    // ======================================================================
    // ======================================================================

    public function visitaCaracteristicasInmuebleUpdate($idVisita)
    {
        return new VisitaCaracteristicasInmuebleUpdate($idVisita);
    }

    // ======================================================================
    // ======================================================================

    public function visitaAcabadosInmuebleUpdate($idVisita)
    {
        return new VisitaAcabadosInmuebleUpdate($idVisita);
    }

    // ======================================================================
    // ======================================================================

    public function visitaCalificacionInmuebleUpdate($idVisita)
    {
        return new VisitaCalificacionInmuebleUpdate($idVisita);
    }

    // ======================================================================
    // ======================================================================

    public function visitaDotacionComunalUpdate($idVisita)
    {
        return new VisitaDotacionComunalUpdate($idVisita);
    }

    // ======================================================================
    // ======================================================================

    public function visitaInfoSectorUpdate($idVisita)
    {
        return new VisitaInfoSectorUpdate($idVisita);
    }

    // ======================================================================
    // ======================================================================

    public function visitaCondiUrbanisticasUpdate($idVisita)
    {
        return new VisitaCondiUrbanisticasUpdate($idVisita);
    }

    // ======================================================================
    // ======================================================================

    public function visitaEstadoConservacionUpdate($idVisita)
    {
        return new VisitaEstadoConservacionUpdate($idVisita);
    }

    // ======================================================================
    // ======================================================================

    public function visitaObserGeneralesUpdate($idVisita)
    {
        return new VisitaObserGeneralesUpdate($idVisita);
    }

    // ======================================================================
    // ======================================================================

    public function visitaRegFotograficoUpdate($idVisita)
    {
        return new VisitaRegFotograficoUpdate($idVisita);
    }

    // ======================================================================
    // ======================================================================

    public function visitaValorEstimadoUpdate($idVisita)
    {
        return new VisitaValorEstimadoUpdate($idVisita);
    }

    // ======================================================================
    // ======================================================================

}
