<?php

namespace App\Http\Responsable\avaluo;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use GuzzleHttp\Client;
use App\Models\Cliente;

class AvaluoClienteUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idVisita = request('id_visita', null);
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

        // dd($request,$fechaNacimiento);

        // ==============================================================================

        if (isset($fechaNacimiento) && !is_null($fechaNacimiento) && !empty($fechaNacimiento)) {
            $fechaNacimiento = Date::parse($fechaNacimiento)->timestamp;
        } else {
            $fechaNacimiento = null;
        }

        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            // Consumimos el API
            // $client = new Client([
            //     'base_uri' => 'http://localhost:8000/api/avaluo_cliente_update/{id}',
            //     'headers' => [
                    
            //     ],
            //     'body' => json_encode($request)
            // ]);

            // $response = $client->request('POST');
            // $res = $response->getBody()->getContents();
            // dd($res);

            $editarAvaluoCliente = Cliente::where('id_cliente', $idCliente)
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

            if($editarAvaluoCliente) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Cliente editado satisfactoriamente');
                return redirect('calcular_avaluo/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Ha ocurrido un error al editar el cliente la visita, por favor contacte a Soporte.');
                return redirect('calcular_avaluo/'.$idVisita);
            }
        } catch (Exception $e) {
            dd($e);
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
