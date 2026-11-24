<?php

namespace App\Http\Controllers\inicio_sesion;

use App\Http\Controllers\Controller;
use App\Http\Responsable\inicio_sesion\LoginStore;
use App\Http\Responsable\inicio_sesion\RecuperarClave;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'keepalive']);
        $this->middleware('auth')->only('keepalive');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensajeSesionExpirada = session()->pull('sesion_expirada');

        if ($mensajeSesionExpirada) {
            alert()->warning('Sesión cerrada', $mensajeSesionExpirada);
        }

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
            if (session('api_jwt_token')) {
                try {
                    $this->getClientApi()->post('auth/logout');
                } catch (Exception $e) {
                    // La sesión local se cierra aunque la API no responda.
                }
            }

            Session::flush();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->to(route('inicio'));

        } catch (Exception $e) {
            alert()->error('Ha ocurrido un error');
            return back();
        }
    }

    /**
     * Renueva el JWT mientras el usuario sigue activo (evita cierre por TTL fijo).
     */
    public function keepalive(Request $request)
    {
        try {
            if (! session('sesion_iniciada') || ! session('api_jwt_token')) {
                return response()->json(['message' => 'Unauthenticated.', 'sesion_expirada' => true], 401);
            }

            $response = $this->getClientApi()->post('auth/refresh');
            $data = json_decode($response->getBody()->getContents());

            if (empty($data->access_token)) {
                return response()->json(['message' => 'No se pudo renovar la sesión.', 'sesion_expirada' => true], 401);
            }

            $exp = isset($data->expires_in)
                ? time() + (int) $data->expires_in
                : $this->expiracionDelTokenJwt($data->access_token);

            session()->put('api_jwt_token', $data->access_token);
            session()->put('api_jwt_exp', $exp);
            session()->put('sesion_iniciada', true);

            return response()->json([
                'status' => 'ok',
                'exp' => $exp,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'No se pudo renovar la sesión.',
                'sesion_expirada' => true,
            ], 401);
        }
    }

    private function expiracionDelTokenJwt(string $token): int
    {
        $partes = explode('.', $token);

        if (count($partes) !== 3) {
            return time() + 3600;
        }

        $payload = strtr($partes[1], '-_', '+/');
        $payload .= str_repeat('=', (4 - strlen($payload) % 4) % 4);
        $datos = json_decode(base64_decode($payload, true), true);

        return (int) ($datos['exp'] ?? (time() + 3600));
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