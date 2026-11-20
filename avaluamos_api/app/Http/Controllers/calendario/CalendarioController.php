<?php

namespace App\Http\Controllers\calendario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Http\Responsable\calendario\CalendarioIndex;
use App\Http\Responsable\calendario\CalendarioStore;
use App\Http\Responsable\calendario\CalendarioEdit;
use App\Http\Responsable\calendario\CalendarioUpdate;
use App\Http\Responsable\calendario\CalendarioDestroy;
use App\Http\Responsable\calendario\CalendarioConsultarVisitas;
use App\Http\Responsable\calendario\CalendarioConsultarVisitaIndividual;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return new CalendarioIndex();
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
        return new CalendarioStore();
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
    public function edit($idCalendario)
    {
        // return new CalendarioEdit($idCalendario);
    }

    // ======================================================================
    // ======================================================================

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idVisitaEditar
     * @return \Illuminate\Http\Response
     */
    public function update($idVisitaEditar)
    {
        return new CalendarioUpdate($idVisitaEditar);
    }

    // ======================================================================
    // ======================================================================

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idCalendario
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCalendario)
    {
        // return new CalendarioDestroy($idCalendario);
    }

    // ======================================================================
    // ======================================================================

    public function calendarioConsultarVisitas()
    {
        return new CalendarioConsultarVisitas();
    }

    // ======================================================================
    // ======================================================================

    public function calendarioConsultarVisitaIndividual($idVisitaIndividual)
    {
        return new CalendarioConsultarVisitaIndividual($idVisitaIndividual);
    }

}
