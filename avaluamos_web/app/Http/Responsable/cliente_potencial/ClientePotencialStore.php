<?php

namespace App\Http\Responsable\cliente_potencial;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\Models\Cliente;

class ClientePotencialStore implements Responsable
{
    public function toResponse($request)
    {
        $cliNombres = strtoupper(request('nombre_solicitante', null));
        $idDocCliente = request('id_doc_cliente', null);
        $documentoCliente = strtoupper(request('documento_cliente', null));
        $fechaNacimiento = request('fecha_nacimiento', null);
        $cliCelular = request('celular', null);
        $cliEmail = request('correo', null);
        $idTipoPersona = request('tipo_persona', null);
        $idPais = request('pais', null);
        $idDepartamento = request('departamento', null);
        $idCiudad = request('municipio', null);
        $idReferidoPor = request('id_referido_por', null);
        $idRedSocial = request('id_red_social', null);
        $nombreQuienRefiere = request('nombre_quien_refiere', null);
        $empresaQueRefiere = request('empresa_que_refiere', null);
        $usuLogueado = session('id_usuario');

        // ==============================================================================
        
        if (isset($fechaNacimiento) && !is_null($fechaNacimiento) && !empty($fechaNacimiento)) {
            $fechaNacimiento = Date::parse($fechaNacimiento)->timestamp;
        } else {
            $fechaNacimiento = null;
        }

        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $nuevoCliente = Cliente::create([
                                'cli_nombres' => $cliNombres,
                                'id_doc_cliente' => $idDocCliente,
                                'documento_cliente' => $documentoCliente,
                                'fecha_nacimiento' => $fechaNacimiento,
                                'cli_celular' => $cliCelular,
                                'cli_email' => $cliEmail,
                                'id_tipo_persona' => $idTipoPersona,
                                'id_pais' => $idPais,
                                'id_dpto_estado' => $idDepartamento,
                                'id_ciudad' => $idCiudad,
                                'id_referido_por' => $idReferidoPor,
                                'id_red_social' => $idRedSocial,
                                'nombre_quien_refiere' => $nombreQuienRefiere,
                                'empresa_que_refiere' => $empresaQueRefiere,
                                'empresa_que_refiere' => $empresaQueRefiere,
                                'usu_logueado' => $usuLogueado,
                            ]);

            if($nuevoCliente)
            {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Cliente creado satisfactoriamente');
                return redirect()->to(route('cliente_potencial.index'));

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Ha ocurrido un error al crear el Cliente, por favor contacte a Soporte.');
                return redirect()->to(route('cliente_potencial.index'));
            }
        }
        catch (Exception $e)
        {
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    } // CIERRE toResponse
} // CIERRE Clase
