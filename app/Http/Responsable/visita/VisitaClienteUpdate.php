<?php

namespace App\Http\Responsable\visita;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Jenssegers\Date\Date;
use App\Models\Cliente;

class VisitaClienteUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idCliente = request('id_cliente', null);
        $cliNombres = strtoupper(request('cli_nombres', null));
        $cliTipoDoc = request('cli_tipo_doc', null);
        $docCliente = request('doc_cliente', null);
        $fechaNacimiento = request('fecha_nacimiento', null);
        $cliCelular = request('cli_celular', null);
        $cliCorreo = request('cli_correo', null);
        $tipoPersona = request('tipo_persona', null);
        $cliPais = request('cli_pais', null);
        $cliDpto = request('cli_dpto', null);
        $cliCiudad = request('cli_ciudad', null);
        $referidoPor = request('referido_por', null);
        $redSocial = request('red_social', null);
        $nombreQuienRefiere = request('nombre_quien_refiere', null);
        $empresaQueRefiere = request('empresa_que_refiere', null);

        // ==============================================================================

        if ($cliTipoDoc != "-1" || $cliTipoDoc != -1) {
            $cliTipoDoc = request('cli_tipo_doc', null);
        } else {
            $cliTipoDoc = null;
        }

        // ==============================
        
        if (isset($fechaNacimiento) && !is_null($fechaNacimiento) && !empty($fechaNacimiento)) {
            $fechaNacimiento = Date::parse($fechaNacimiento)->timestamp;
        } else {
            $fechaNacimiento = null;
        }
        
        // ==============================

        if ($tipoPersona != "-1" || $tipoPersona != -1) {
            $tipoPersona = request('tipo_persona', null);
        } else {
            $tipoPersona = null;
        }

        // ==============================
        
        if ($cliPais != "-1" || $cliPais != -1) {
            $cliPais = request('cli_pais', null);
        } else {
            $cliPais = null;
        }

        // ==============================
        
        if ($cliDpto != "-1" || $cliDpto != -1) {
            $cliDpto = request('cli_dpto', null);
        } else {
            $cliDpto = null;
        }

        // ==============================

        if ($cliCiudad != "-1" || $cliCiudad != -1) {
            $cliCiudad = request('cli_ciudad', null);
        } else {
            $cliCiudad = null;
        }
        
        // ==============================

        if ($referidoPor != "-1" || $referidoPor != -1) {
            $referidoPor = request('referido_por', null);
        } else {
            $referidoPor = null;
        }

        // ==============================

        if ($redSocial != "-1" || $redSocial != -1) {
            $redSocial = request('red_social', null);
        } else {
            $redSocial = null;
        }

        
        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarCliente = Cliente::where('id_cliente', $idCliente)
                    ->update(
                        [
                            'cli_nombres' => $cliNombres,
                            'id_doc_cliente' => $cliTipoDoc,
                            'documento_cliente' => $docCliente,
                            'fecha_nacimiento' => $fechaNacimiento,
                            'cli_celular' => $cliCelular,
                            'cli_email' => $cliCorreo,
                            'id_tipo_persona' => $tipoPersona,
                            'id_pais' => $cliPais,
                            'id_dpto_estado' => $cliDpto,
                            'id_ciudad' => $cliCiudad,
                            'id_referido_por' => $referidoPor,
                            'id_red_social' => $redSocial,
                            'nombre_quien_refiere' => $nombreQuienRefiere,
                            'empresa_que_refiere' => $empresaQueRefiere,
                        ]
                    );

            if($editarCliente) {
                DB::connection('mysql')->commit();

                alert()->success('Proceso Exitoso', 'Cliente editado satisfactoriamente');
                return redirect('editar_visita/'.$id_visita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Ha ocurrido un error al editar el cliente la visita, por favor contacte a Soporte.');
                return redirect('editar_visita/'.$id_visita);
            }
        }
        catch (Exception $e)
        {
            dd($e);
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
