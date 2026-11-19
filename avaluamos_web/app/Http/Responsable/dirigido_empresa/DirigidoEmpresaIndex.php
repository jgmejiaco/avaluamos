<?php

namespace App\Http\Responsable\dirigido_empresa;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class DirigidoEmpresaIndex implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->get('dirigido_empresa_index', [
                'query' => [],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());
            $empresas = $respuesta->dirigidoEmpresas ?? [];

            return view('dirigido_empresa.index', compact('empresas'));
            
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error DirigidoEmpresaIndex: '.$e->getMessage());
            alert()->error('Error cargando la información de la empresa.');

            return redirect()->route('inicio');
        }
    }
}
