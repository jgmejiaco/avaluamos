<?php

namespace App\Http\Controllers\dirigido_empresa;

use App\Http\Controllers\Controller;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaEdit;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaIndex;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaStore;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaUpdate;
use Exception;
use Illuminate\Http\Request;

class DirigidoEmpresaController extends Controller
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
    public function index(Request $request)
    {
        try {

            return new DirigidoEmpresaIndex();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            return new DirigidoEmpresaStore();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
        }
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

    /**
     * Show the form for editing the specified resource.
     * El resource usa el parámetro {dirigido_empresa}.
     *
     * @param  int  $idDirigidoA
     * @return \Illuminate\Http\Response
     */
    public function edit($idDirigidoA)
    {
        try {
            return new DirigidoEmpresaEdit($idDirigidoA);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error al editar la empresa.");
            return redirect()->to(route('dirigido_empresa.index'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idDirigidoA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idDirigidoA)
    {
        try {
            return new DirigidoEmpresaUpdate($idDirigidoA);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
        }
    }

    // ========================================================

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

    // ========================================================
    
    public function validarEmpresa(Request $request)
    {
        try {
            $response = $this->getClientApi()->post('dirigido_empresa_consultar', [
                'json' => [
                    'id_tipo_documento' => request('id_tipo_documento', null),
                    'numero_documento'  => request('numero_documento', null),
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
}
