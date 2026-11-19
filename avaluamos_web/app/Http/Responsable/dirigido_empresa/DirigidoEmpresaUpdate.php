<?php

namespace App\Http\Responsable\dirigido_empresa;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class DirigidoEmpresaUpdate implements Responsable
{
    use MetodosTrait;

    protected $idDirigidoA;

    public function __construct($idDirigidoA = null)
    {
        $this->idDirigidoA = $idDirigidoA;
    }

    public function toResponse($request)
    {
        try {
            // Claves alineadas con la API (DirigidoEmpresaUpdate)
            $response = $this->getClientApi()->put('dirigido_empresa_update/'.$this->idDirigidoA, [
                'json' => [
                    'id_tipo_documento' => request('id_tipo_documento_editar'),
                    'numero_documento'  => request('numero_documento_editar'),
                    'nombre_empresa'    => request('nombre_empresa_editar'),
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (! empty($respuesta->success)) {
                alert()->success('Proceso exitoso', 'Se ha editado la empresa');
                return redirect()->to(route('dirigido_empresa.index'));
            }

            alert()->error('Error', $respuesta->message ?? 'No fue posible editar la empresa.');
            return back();

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error DirigidoEmpresaUpdate: '.$e->getMessage());
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
