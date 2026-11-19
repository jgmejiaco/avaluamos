<?php

namespace App\Http\Controllers\dirigido_empresa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaIndex;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaStore;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaEdit;
use App\Http\Responsable\dirigido_empresa\DirigidoEmpresaUpdate;
use Illuminate\Support\Facades\Hash;
use App\Models\DirigidoEmpresa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class DirigidoEmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DirigidoEmpresaIndex();
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
        // return new DirigidoEmpresaStore();
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
     * @param  int  $idDirigidoA
     * @return \Illuminate\Http\Response
     */
    public function edit($idDirigidoA)
    {
        return new DirigidoEmpresaEdit($idDirigidoA);
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
    public function update($idUsuario)
    {
        // return new DirigidoEmpresaUpdate($idUsuario);
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

    // public function verificarDocumentoStore(Request $request)
    // {
    //     $usuidTipoDocumento = request('usuidTipoDocumento', null);
    //     $usuNumeroDocumento = request('usuNumeroDocumento', null);

    //     try {
    //         $verificarDocumento = Usuario::select('id_tipo_documento', 'numero_documento')
    //                     ->where('id_tipo_documento', $usuidTipoDocumento)
    //                     ->where('numero_documento', $usuNumeroDocumento)
    //                     ->first();

    //         if(isset($verificarDocumento) && !is_null($verificarDocumento) && !empty($verificarDocumento)) {
    //             return response()->json('existe_documento');
    //         } else {
    //             return response()->json('no_existe_documento');
    //         }
    //     } catch (Exception $e) {
    //         return response()->json("error_exception");
    //     }
    // }

    // ======================================================================
    // ======================================================================

    // public function verificarCorreoStore(Request $request)
    // {
    //     $usuCorreo = trim((string) request('usuCorreo', ''));

    //     if ($usuCorreo === '') {
    //         return response()->json('correo_vacio');
    //     }

    //     try {
    //         $existeCorreo = Usuario::whereRaw('LOWER(correo) = ?', [strtolower($usuCorreo)])->exists();

    //         if ($existeCorreo) {
    //             return response()->json('existe_correo');
    //         }

    //         return response()->json('no_existe_correo');

    //     } catch (Exception $e) {
    //         return response()->json('error_exception');
    //     }
    // }

    // ======================================================================
    // ======================================================================

    // public function consultarAliasUsuarioStore()
    // {
    //     $aliasUsuario = trim((string) request('nombre_usuario', ''));

    //     if ($aliasUsuario === '') {
    //         return response()->json('alias_vacio');
    //     }

    //     try {
    //         $existeAlias = Usuario::where('nombre_usuario', $aliasUsuario)->exists();

    //         if ($existeAlias) {
    //             return response()->json('existe_alias');
    //         }

    //         return response()->json('no_existe_alias');
            
    //     } catch (Exception $e) {
    //         return response()->json('error_exception');
    //     }
    // }

    // ======================================================================
    // ======================================================================

   
}
