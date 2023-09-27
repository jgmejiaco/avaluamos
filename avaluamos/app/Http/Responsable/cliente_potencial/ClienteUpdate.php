<?php

namespace App\Http\Responsable\cliente_potencial;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\Models\Cliente;

class ClienteUpdate implements Responsable
{
    public function toResponse($request)
    {
        // dd($request);
        $idCliente = request('id_cliente', null);
        $nombreSolicitante = strtoupper(request('nombre_solicitante', null));
        $idDocCliente = request('id_doc_cliente', null);
        $documentoCliente = request('documento_cliente', null);
        $fechaNacimiento = request('fecha_nacimiento', null);
        $celular = request('celular', null);
        $correo = request('correo', null);
        $tipoPersona = request('tipo_persona', null);
        $pais = request('pais', null);
        $departamento = request('departamento', null);
        $municipio = request('municipio', null);
        $idReferidoPor = request('id_referido_por', null);
        $idRedSocial = request('id_red_social', null);
        $nombreQuienRefiere = request('nombre_quien_refiere', null);
        $empresaQueRefiere = request('empresa_que_refiere', null);

        // ==============================================================================
        
        if (isset($fechaNacimiento) && !is_null($fechaNacimiento) && !empty($fechaNacimiento)) {
            $fechaNacimiento = Date::parse($fechaNacimiento)->timestamp;
        } else {
            $fechaNacimiento = null;
        }

        // dd($fechaNacimiento);
        
        // ==============================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarCliente = Cliente::where('id_cliente', $idCliente)
                    ->update(
                        [
                            'cli_nombres' => $nombreSolicitante,
                            'id_doc_cliente' => $idDocCliente,
                            'documento_cliente' => $documentoCliente,
                            'fecha_nacimiento' => $fechaNacimiento,
                            'cli_celular' => $celular,
                            'cli_email' => $correo,
                            'id_tipo_persona' => $tipoPersona,
                            'id_pais' => $pais,
                            'id_dpto_estado' => $departamento,
                            'id_ciudad' => $municipio,
                            'id_referido_por' => $idReferidoPor,
                            'id_red_social' => $idRedSocial,
                            'nombre_quien_refiere' => $nombreQuienRefiere,
                            'empresa_que_refiere' => $empresaQueRefiere,
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
            dd($e);
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Ha ocurrido un excepción, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
