<?php

namespace App\Http\Controllers\cliente_potencial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Cliente;
use App\Models\TipoDocumento;
use App\Models\TipoPersona;
use App\Models\Pais;
use App\Models\DepartamentoEstado;
use App\Models\Ciudad;
use App\Models\ReferidoPor;
use App\Models\RedSocial;
use App\Http\Responsable\cliente_potencial\ClientePotencialStore;
use App\Http\Responsable\cliente_potencial\ClientePotencialUpdate;
use App\Http\Responsable\cliente_potencial\ClientePotencialIndex;
use App\Http\Responsable\cliente_potencial\ClientePotencialEdit;
use App\Http\Responsable\cliente_potencial\ClientePotencialShow;

class ClientePotencialController extends Controller
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

            return new ClientePotencialIndex();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error cargando los clientes potenciales.");
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
        try {

            return view('cliente_potencial.create');

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
        }
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
            return new ClientePotencialStore();

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idCliente
     * @return \Illuminate\Http\Response
     */
    public function show($idCliente)
    {
        try {
            return new ClientePotencialShow($idCliente);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idCliente)
    {
        try {
            return new ClientePotencialEdit($idCliente);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }
            alert()->error("Ha ocurrido un error!");
            return redirect()->to(route('inicio'));
        }
    }

    /**
     * Update the specified resource in storage.
     * Resource: PUT /cliente_potencial/{cliente_potencial}
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $clientePotencial 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clientePotencial )
    {
        try {
            return new ClientePotencialUpdate($clientePotencial );

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
    
    public function verificarCelular()
    {
        try {
            $cliCelular = request('cliCelular', null);

            $response = $this->getClientApi()->post('cliente_verificar_celular', [
                'json' => [
                    'cliCelular' => $cliCelular,
                ],
            ]);

            $clienteVerificarCelular = json_decode($response->getBody()->getContents());

            return response()->json($clienteVerificarCelular);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error verificarCelular: '.$e->getMessage());
            return response()->json('error_exception');
        }
    }

    // ========================================================

    public function consultarCiudadDpto()
    {
        try {
            $idDpto = request('id_dpto', null);

            if ($idDpto === null || $idDpto === '' || $idDpto === '-1') {
                return response()->json([]);
            }

            $response = $this->getClientApi()->post('cliente_consultar_ciudad_dpto', [
                'json' => [
                    'id_dpto' => $idDpto,
                ],
            ]);

            $clienteCiudadesDpto = json_decode($response->getBody()->getContents());

            return response()->json($clienteCiudadesDpto);

        } catch (Exception $e) {
            if (\App\Support\FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error consultarCiudadDpto: '.$e->getMessage());
            return response()->json([]);
        }
    }
}