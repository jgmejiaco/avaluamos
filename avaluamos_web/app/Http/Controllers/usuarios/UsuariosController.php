<?php

namespace App\Http\Controllers\usuarios;

use App\Http\Controllers\Controller;
use App\Http\Responsable\usuarios\UsuarioEdit;
use App\Http\Responsable\usuarios\UsuarioIndex;
use App\Http\Responsable\usuarios\UsuarioStore;
use App\Http\Responsable\usuarios\UsuarioUpdate;
use Exception;
use Illuminate\Http\Request;

class UsuariosController extends Controller
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
            return new UsuarioIndex();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Error cargando los usuarios!");
            return redirect()->to(route('inicio'));
        }
    }

    // ==========================================================================

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('usuarios.create');

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
        }
    }

    // ==========================================================================

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            return new UsuarioStore();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
        }
    }

    // ==========================================================================

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    // ==========================================================================

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idUsuario)
    {
        try {
            return new UsuarioEdit($idUsuario);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error al editar el usuario.");
            return redirect()->to(route('usuarios.index'));
        }
    }

    // ==========================================================================

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($idUsuario)
    {
        try {
            return new UsuarioUpdate($idUsuario);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error al actualizar el usuario.");
            return redirect()->to(route('usuarios.index'));
        }
    }

    // ==========================================================================

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    // ==========================================================================


    public function verificarDocumentoStore()
    {
        try {
            $response = $this->getClientApi()->post('verificar_documento_store', [
                'json' => [
                    'usuidTipoDocumento' => request('usuidTipoDocumento', null),
                    'usuNumeroDocumento' => request('usuNumeroDocumento', null),
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            return response()->json($respuesta);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }

            return response()->json('error_exception');
        }
    }

    // ==========================================================================

    public function verificarCorreoStore()
    {
        try {
            $usuCorreo = trim((string) request('usuCorreo', ''));

            if ($usuCorreo === '') {
                return response()->json('correo_vacio');
            }

            $response = $this->getClientApi()->post('verificar_correo_store', [
                'json' => [
                    'usuCorreo' => $usuCorreo,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            return response()->json($respuesta);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }

            return response()->json('error_exception');
        }
    }

    // ==========================================================================

} // FIN class UsuariosController extends Controller

