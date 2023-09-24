<?php

namespace App\Http\Responsable\dirigido_empresa;

use App\User;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\Models\Usuario;
use App\Models\DirigidoA;

class DirigidoEmpresaUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idEmpresa = strtoupper(request('id_empresa_editar', null));
        $idTipoDocumentoEditar = strtoupper(request('id_tipo_documento_editar', null));
        $numeroDocumentoEditar = strtoupper(request('numero_documento_editar', null));
        $nombreEmpresaEditar = strtoupper(request('nombre_empresa_editar', null));

        // ========================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarEmpresa = DirigidoA::where('id_dirigido_a', $idEmpresa)
                    ->update(
                        [
                            'id_tipo_documento' => $idTipoDocumentoEditar,
                            'numero_documento' => $numeroDocumentoEditar,
                            'dirigido_a' => $nombreEmpresaEditar,
                        ]
                    );

            // =======================================

            if($editarEmpresa) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso exitoso', 'Se ha editado la empresa');
                return redirect()->to(route('dirigido_empresa.index'));

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Ha ocurrido un error al editar la empresa, por favor contacte a Soporte.');
                return redirect()->to(route('dirigido_empresa.index'));
            }
        } catch (Exception $e) {
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Ha ocurrido un excepción, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
