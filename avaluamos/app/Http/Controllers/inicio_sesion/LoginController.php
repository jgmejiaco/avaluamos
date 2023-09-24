<?php

namespace App\Http\Controllers\inicio_sesion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Responsable\inicio_sesion\LoginStore;
use Exception;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // try {
        //     $sesion = $this->validarVariablesSesion();

        //     if (empty($sesion[0]) || is_null($sesion[0]) &&
        //         empty($sesion[1]) || is_null($sesion[1]) &&
        //         empty($sesion[2]) || is_null($sesion[2]) &&
        //         empty($sesion[3]) || is_null($sesion[3]) && $sesion[3] != true)
        //     {
        //         return redirect()->to(route('inicio'));
        //     } else {
                $this->shareData();
                return view('inicio_sesion.login');
        //     }
        // } catch (Exception $e) {
        //     // dd($e);
        //     alert()->error("Ha ocurrido un error!");
        // }
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
        // dd($request);
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

            return redirect()->to(route('login'));

        } catch (Exception $e) {
            alert()->error('Error','An error has occurred, try again, if the problem persists contact support.');
            return back();
        }
    }
    
    // public function resetPassword()
    // {
    //     return view('inicio_sesion.resetear_password_administrador');
    // }
    
    // ======================================================================
    
    // public function recoveryPassword(Request $request)
    // {
    //     return view('inicio_sesion.recovery_password');
    // }
    
    // ======================================================================

    
}