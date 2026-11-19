<?php

namespace App\Http\Responsable\dirigido_empresa;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class DirigidoEmpresaEdit implements Responsable
{
    use MetodosTrait;

    protected $idDirigidoA;

    public function __construct($idDirigidoA)
    {
        $this->idDirigidoA = $idDirigidoA;
    }

    public function toResponse($request)
    {
        try {
            // id 0 es válido en BD ("A QUIEN INTERESE"); empty(0) === true en PHP
            if ($this->idDirigidoA === null || $this->idDirigidoA === '') {
                return response(
                    '<div class="alert alert-warning m-3">No se encontró la empresa.</div>',
                    404
                );
            }

            $response = $this->getClientApi()->get('dirigido_empresa_edit/'.$this->idDirigidoA);

            $empresa = json_decode($response->getBody()->getContents());

            if (! is_object($empresa) || ! isset($empresa->id_dirigido_a)) {
                return response(
                    '<div class="alert alert-warning m-3">No se encontró la empresa.</div>',
                    404
                );
            }

            return view('dirigido_empresa.modal_editar_empresa', compact('empresa'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error DirigidoEmpresaEdit: '.$e->getMessage());

            return response(
                '<div class="alert alert-danger m-3">Error al cargar el formulario de edición.</div>',
                500
            );
        }
    }
}
