<?php

namespace App\Http\Responsable\dirigido_empresa;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class DirigidoEmpresaStore implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->post('dirigido_empresa_store', [
                'json' => [
                    'id_tipo_documento' => request('id_tipo_documento'),
                    'numero_documento'  => request('numero_documento'),
                    'nombre_empresa'    => request('nombre_empresa'),
                    'usu_logueado'      => session('id_usuario'),
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (empty($respuesta->success)) {
                throw new Exception($respuesta->message ?? 'No fue posible crear la empresa.');
            }

            alert()->success('Proceso exitoso', 'Se ha creado una nueva empresa');
            return redirect()->to(route('dirigido_empresa.index'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error DirigidoEmpresaStore: '.$e->getMessage());
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
