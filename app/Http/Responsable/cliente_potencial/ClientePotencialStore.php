<?php

namespace App\Http\Responsable\cliente_potencial;

use App\User;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Date\Date;
use App\Models\Usuario;
use App\Models\DirigidoA;
use App\Models\ReferidoPor;
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

        // ==============================================================================

        if ($idDocCliente != "-1" || $idDocCliente != -1) {
            $idDocCliente = request('id_doc_cliente', null);
        } else {
            $idDocCliente = null;
        }

        // ==============================
        
        if (isset($fechaNacimiento) && !is_null($fechaNacimiento) && !empty($fechaNacimiento)) {
            $fechaNacimiento = Date::parse($fechaNacimiento)->timestamp;
        } else {
            $fechaNacimiento = null;
        }

        // ==============================
        
        if ($idTipoPersona != "-1" || $idTipoPersona != -1) {
            $idTipoPersona = request('tipo_persona', null);
        } else {
            $idTipoPersona = null;
        }

        // ==============================

        if ($idPais != "-1" || $idPais != -1) {
            $idPais = request('pais', null);
        } else {
            $idPais = null;
        }

        // ==============================

        if ($idDepartamento != "-1" || $idDepartamento != -1) {
            $idDepartamento = request('departamento', null);
        } else {
            $idDepartamento = null;
        }

        // ==============================

        if ($idCiudad != "-1" || $idCiudad != -1) {
            $idCiudad = request('municipio', null);
        } else {
            $idCiudad = null;
        }

        // ==============================

        if ($idReferidoPor != "-1" || $idReferidoPor != -1) {
            $idReferidoPor = request('id_referido_por', null);
        } else {
            $idReferidoPor = null;
        }

        // ==============================

        if ($idRedSocial != "-1" || $idRedSocial != -1) {
            $idRedSocial = request('id_red_social', null);
        } else {
            $idRedSocial = null;
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
