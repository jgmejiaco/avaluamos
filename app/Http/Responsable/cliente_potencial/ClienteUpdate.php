<?php

namespace App\Http\Responsable\cliente_potencial;

use App\User;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\Models\Usuario;
use App\Models\DirigidoA;
use App\Models\Cliente;

class ClienteUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idCliente = request('id_cliente', null);
        $cli_nombres = request('nombres', null);
        $idTipoDocumentoCliente = request('id_doc_cliente', null);
        $documentoCliente = strtoupper(request('documento_cliente', null));
        $fecha_nacimiento = request('fecha_nacimiento', null);
        $cliCelular = request('cli_celular', null);
        $cliEmail = request('cli_email', null);
        $idTipoPersona = request('id_tipo_persona', null);
        $paisEdit = request('pais_edit', null);
        $dptoEdit = request('dpto_edit', null);
        $ciudadEdit = request('ciudad_edit', null);
        $referidoPorEdit = request('referido_por_edit', null);
        $redSocialEdit = request('red_social_edit', null);
        $quienRefiereEdit = strtoupper(request('quien_refiere_edit', null));
        $empresaRefiereEdit = strtoupper(request('empresa_refiere_edit', null));

        // ========================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarCliente = Cliente::where('id_cliente', $idCliente)
                    ->update(
                        [
                            'cli_nombres' => $cli_nombres,
                            'id_doc_cliente' => $idTipoDocumentoCliente,
                            'documento_cliente' => $documentoCliente,
                            'fecha_nacimiento' => $fecha_nacimiento,
                            'cli_celular' => $cliCelular,
                            'cli_email' => $cliEmail,
                            'id_tipo_persona' => $idTipoPersona,
                            'id_pais' => $paisEdit,
                            'id_dpto_estado' => $dptoEdit,
                            'id_ciudad' => $ciudadEdit,
                            'id_referido_por' => $referidoPorEdit,
                            'id_red_social' => $redSocialEdit,
                            'nombre_quien_refiere' => $quienRefiereEdit,
                            'empresa_que_refiere' => $empresaRefiereEdit,
                        ]
                    );

            // =======================================

            if($editarCliente) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso exitoso', 'Se ha editado el Cliente');
                return redirect()->to(route('cliente_potencial.index'));

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Ha ocurrido un error al editar el Cliente, por favor contacte a Soporte.');
                return redirect()->to(route('cliente_potencial.index'));
            }
        } catch (Exception $e) {
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Ha ocurrido un excepción, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
