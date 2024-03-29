<?php

namespace App\Http\Responsable\avaluo;
use Illuminate\Http\Request;

use Exception;
use Illuminate\Contracts\Support\Responsable;
// use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\Models\Cliente;

class AvaluoClienteUpdate implements Responsable
{
    public $datos;

    public function toResponse($request)
    {
        $datos = $request->json()->all();

        dd($datos);
        $idCliente = request('id_cliente', null);
        $cliNombres = strtoupper(request('cli_nombres', null));
        $cliTipoDoc = request('cli_tipo_doc', null);
        $docCliente = request('doc_cliente', null);
        $fechaNacimiento = $datos['fecha_nacimiento'];
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
        dd($fechaNacimiento);

        if (isset($fechaNacimiento) && !is_null($fechaNacimiento) && !empty($fechaNacimiento)) {
            $fechaNacimiento = Date::parse($fechaNacimiento)->timestamp;
        } else {
            $fechaNacimiento = null;
        }

        dd($fechaNacimiento);

        // ==============================================================================
        // ==============================================================================

        // DB::connection('mysql')->beginTransaction();

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
                return response()->json(['message' => 'Cliente actualizado con exito']);
                // DB::connection('mysql')->commit();

                // alert()->success('Proceso Exitoso', 'Cliente editado satisfactoriamente');
                // return redirect('calcular_avaluo/'.$idVisita);

            } else {
                return response()->json(['error' => 'Ocurrio un error al actualizar el cliente'], 500);
                // DB::connection('mysql')->rollback();

                // alert()->error('Error', 'Ha ocurrido un error al editar el cliente la visita, por favor contacte a Soporte.');
                // return redirect('calcular_avaluo/'.$idVisita);
            }
        }
        catch (Exception $e)
        {
            dd($e);
            return response()->json(['error' => 'Exception'], 500);
            // DB::connection('mysql')->rollback();
            // alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            // return back();
        }
    }
}
