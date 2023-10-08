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

class DirigidoEmpresaStore implements Responsable
{
    public function toResponse($request)
    {
        $idTipoDocumento = strtoupper(request('id_tipo_documento', null));
        $numeroDocumento = strtoupper(request('numero_documento', null));
        $nombreEmpresa = strtoupper(request('nombre_empresa', null));
        $usuLogueado = session('id_usuario');

        // ========================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $nuevaEmpresa = DirigidoA::create([
                'dirigido_a' => $nombreEmpresa,
                'id_tipo_documento' => $idTipoDocumento,
                'numero_documento' => $numeroDocumento,
                'usu_logueado' => $usuLogueado,
            ]);

            // =======================================

            if($nuevaEmpresa) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso exitoso', 'Se ha creado una nueva empresa');
                return redirect()->to(route('dirigido_empresa.index'));

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Ha ocurrido un error al crear la empresa, por favor contacte a Soporte.');
                return redirect()->to(route('dirigido_empresa.index'));
            }
        } catch (Exception $e) {
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Ha ocurrido un excepción, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
