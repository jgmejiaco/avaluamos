<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Support\ApiClient;
use App\Support\FalloServicio;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('compartirShareData');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $nombreCompleto = $this->nombreUsuarioLogueado();

            return view('home', compact('nombreCompleto'));
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            alert()->error('Error Exception!');
            return redirect()->to(route('inicio'));
        }
    }

    /**
     * Nombre desde sesión (llenada por login API) o fallback GET usuario_edit.
     */
    private function nombreUsuarioLogueado(): string
    {
        $nombres = session('nombres');
        $apellidos = session('apellidos');

        if (($nombres !== null && $nombres !== '') || ($apellidos !== null && $apellidos !== '')) {
            return trim($nombres.' '.$apellidos);
        }

        $idUsuario = session('id_usuario');

        if (! $idUsuario) {
            return 'Visitante';
        }

        $response = app(ApiClient::class)->get('usuario_edit/'.$idUsuario);
        $usuario = json_decode($response->getBody()->getContents());

        if (! is_object($usuario) || ! isset($usuario->id_usuario)) {
            return 'Visitante';
        }

        session()->put('nombres', $usuario->nombres ?? '');
        session()->put('apellidos', $usuario->apellidos ?? '');
        session()->put('nombre_rol', $usuario->nombre_rol ?? session('nombre_rol'));

        return $usuario->nombre_completo
            ?? trim(($usuario->nombres ?? '').' '.($usuario->apellidos ?? ''))
            ?: 'Visitante';
    }

    // ======================================================================

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
