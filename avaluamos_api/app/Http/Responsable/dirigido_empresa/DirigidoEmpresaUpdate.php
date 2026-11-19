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
        // find(0) puede fallar; id 0 es válido en esta tabla
        $empresa = DirigidoA::where('id_dirigido_a', $this->idDirigidoA)->first();

        if (! $empresa) {
            return response()->json([
                'success' => false,
                'message' => 'No existe la empresa',
            ], 404);
        }

        $idTipoDocumento = $request->input('id_tipo_documento_editar')
            ?? $request->input('id_tipo_documento');

        $numeroDocumento = $request->input('numero_documento_editar')
            ?? $request->input('numero_documento');

        $nombreEmpresa = $request->input('nombre_empresa_editar')
            ?? $request->input('nombre_empresa')
            ?? $request->input('dirigido_a');

        // id=0 "A Quien Interese": solo exige nombre
        $esEspecialSinDocumento = (string) $this->idDirigidoA === '0';

        if ($nombreEmpresa === null || trim((string) $nombreEmpresa) === '') {
            return response()->json([
                'success' => false,
                'message' => 'El nombre de la empresa es obligatorio',
            ], 422);
        }

        if (! $esEspecialSinDocumento
            && ($idTipoDocumento === null || $idTipoDocumento === ''
                || $numeroDocumento === null || $numeroDocumento === '')) {
            return response()->json([
                'success' => false,
                'message' => 'Datos incompletos para editar la empresa',
            ], 422);
        }

        try {
            $empresa->id_tipo_documento = ($idTipoDocumento === '' || $idTipoDocumento === null) ? null : $idTipoDocumento;
            $empresa->numero_documento  = ($numeroDocumento === '' || $numeroDocumento === null) ? null : $numeroDocumento;
            $empresa->dirigido_a        = $this->formatoNombrePropio((string) $nombreEmpresa);
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

    private function formatoNombrePropio(?string $texto): ?string
    {
        if ($texto === null || trim($texto) === '') {
            return $texto;
        }

        return mb_convert_case(trim($texto), MB_CASE_TITLE, 'UTF-8');
    }
}
