<?php

namespace App\Http\Controllers\inicio_sesion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Session;
use App\Http\Responsable\inicio_sesion\LoginStore;
use App\Http\Responsable\inicio_sesion\RecuperarClave;
use App\Traits\MetodosTrait;
use Carbon\Carbon;

class LoginController extends Controller
{
    use MetodosTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicio_sesion.login');
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
        // return view('inicio_sesion.login');
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
        return new LoginStore();
    }

    // ======================================================================
    // ======================================================================

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    // ======================================================================
    // ======================================================================

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

    public function logout(Request $request)
    {
        try {
            Session::forget('id_usuario');
            Session::forget('usuario');
            Session::forget('id_rol');
            Session::forget('sesion_iniciada');
            Session::flush();
            $request->session()->flush();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->to(route('inicio'));

        } catch (Exception $e) {
            alert()->error('Ha ocurrido un error');
            return back();
        }
    }
    
    public function resetPassword()
    {
        return view('inicio_sesion.resetear_contrasenia');
    }
    
    public function validarDatos(Request $request)
    {
        try {
            return new RecuperarClave();
        } catch (Exception $e) {
            alert()->error('Ha ocurrido un error');
            return back();
        }
    }

    public function actualizarContraseña($expiration)
    {
        $fechaActual = Carbon::now()->timestamp;

       if($fechaActual <= $expiration) {

           return view('inicio_sesion.actualizar_contraseña');
       } else {
            alert()->error("El link ya ha expirado, realice el proceso nuevamente.");
            return redirect()->to(route('inicio'));
       }
    }
}