<?php

namespace App\Http\Controllers\cliente_potencial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Http\Responsable\cliente_potencial\ClientePotencialIndex;
use App\Http\Responsable\cliente_potencial\ClientePotencialStore;
use App\Http\Responsable\cliente_potencial\ClientePotencialEdit;
use App\Http\Responsable\cliente_potencial\ClientePotencialUpdate;
use App\Http\Responsable\cliente_potencial\ClienteVerificarCelular;
use App\Http\Responsable\cliente_potencial\ClienteConsultarCiudadDpto;
use App\Http\Responsable\cliente_potencial\ClienteVerificarDocumento;
use App\Http\Responsable\cliente_potencial\ClienteVerificarCorreo;


class ClientePotencialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ClientePotencialIndex();
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
        return new ClientePotencialStore();
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
     * @param  int  $idClientePotencial
     * @return \Illuminate\Http\Response
     */
    public function edit($idClientePotencial)
    {
        return new ClientePotencialEdit($idClientePotencial);
    }

    // ======================================================================
    // ======================================================================

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idClientePotencial
     * @return \Illuminate\Http\Response
     */
    public function update($idClientePotencial)
    {
        return new ClientePotencialUpdate($idClientePotencial);
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

    public function clienteVerificarCelular()
    {
        return new ClienteVerificarCelular();
    }

    // ======================================================================
    // ======================================================================

    public function clienteConsultarCiudadDpto()
    {
        return new ClienteConsultarCiudadDpto();
    }

    // ======================================================================
    // ======================================================================

    public function clienteVerificarDocumento()
    {
        return new ClienteVerificarDocumento();
    }

    // ======================================================================
    // ======================================================================

    public function clienteVerificarCorreo()
    {
        return new ClienteVerificarCorreo();
    }

    // ======================================================================
    // ======================================================================

}
