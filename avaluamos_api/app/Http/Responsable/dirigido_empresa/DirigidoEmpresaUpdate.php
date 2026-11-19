<?php

namespace App\Http\Responsable\dirigido_empresa;

use App\Models\DirigidoA;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class DirigidoEmpresaUpdate implements Responsable
{
    protected $idDirigidoA;

    public function __construct($idDirigidoA)
    {
        $this->idDirigidoA = $idDirigidoA;
    }

    public function toResponse($request)
    {
        $empresa = DirigidoA::find($this->idDirigidoA);

        if (! $empresa) {
            return response()->json([
                'success' => false,
                'message' => 'No existe la empresa',
            ], 404);
        }

        try {
            $empresa->dirigido_a        = mb_strtoupper(trim((string) $request->input('nombre_empresa_editar', $request->input('nombre_empresa'))), 'UTF-8');
            $empresa->id_tipo_documento = $request->input('id_tipo_documento_editar', $request->input('id_tipo_documento'));
            $empresa->numero_documento  = $request->input('numero_documento_editar', $request->input('numero_documento'));
            $empresa->save();

            return response()->json([
                'success' => true,
                'message' => 'Empresa editada correctamente',
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error actualizando la empresa',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
