<?php

namespace App\Http\Responsable\cliente_potencial;

use App\Exceptions\ApiOperacionFallidaException;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ClientePotencialUpdate implements Responsable
{
    use MetodosTrait;

    protected $idCliente;

    public function __construct($idCliente = null)
    {
        $this->idCliente = $idCliente ?? request('id_cliente');
    }

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->put('cliente_potencial_update/'.$this->idCliente, [
                'json' => [
                    'nombre_solicitante'   => request('nombre_solicitante'),
                    'id_doc_cliente'       => request('id_doc_cliente'),
                    'documento_cliente'    => request('documento_cliente'),
                    'fecha_nacimiento'     => request('fecha_nacimiento'),
                    'celular'              => request('celular'),
                    'correo'               => request('correo'),
                    'tipo_persona'         => request('tipo_persona'),
                    'pais'                 => request('pais'),
                    'departamento'         => request('departamento'),
                    'municipio'            => request('municipio'),
                    'id_referido_por'      => request('id_referido_por'),
                    'id_red_social'        => request('id_red_social'),
                    'nombre_quien_refiere' => request('nombre_quien_refiere'),
                    'empresa_que_refiere'  => request('empresa_que_refiere'),
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new ApiOperacionFallidaException(
                    $respuesta->message ?? 'No fue posible editar el cliente.'
                );
            }

            alert()->success('Proceso exitoso', 'Se ha editado el Cliente');
            return redirect()->to(route('cliente_potencial.index'));

        } catch (ApiOperacionFallidaException $e) {
            alert()->error('Error', $e->getMessage());
            return back();

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error ClientePotencialUpdate: '.$e->getMessage());
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
