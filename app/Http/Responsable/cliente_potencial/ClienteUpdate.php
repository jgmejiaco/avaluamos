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
        $documentoCliente = request('documento_cliente', null);
        $cliCelular = request('cli_celular', null);
        $cliEmail = request('cli_email', null);
        $idTipoPersona = request('id_tipo_persona', null);

        // ========================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarCliente = Cliente::where('id_cliente', $idCliente)
                    ->update(
                        [
                            'cli_nombres' => $cli_nombres,
                            'id_doc_cliente' => $idTipoDocumentoCliente,
                            'documento_cliente' => $documentoCliente,
                            'cli_celular' => $cliCelular,
                            'cli_email' => $cliEmail,
                            'id_tipo_persona' => $idTipoPersona,
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
