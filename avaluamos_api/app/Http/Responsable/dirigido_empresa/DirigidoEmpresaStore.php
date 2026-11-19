<?php

namespace App\Http\Responsable\dirigido_empresa;

use App\Models\DirigidoA;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class DirigidoEmpresaStore implements Responsable
{
    public function toResponse($request)
    {
        $nombreEmpresa   = $request->input('nombre_empresa');
        $idTipoDocumento = $request->input('id_tipo_documento');
        $numeroDocumento = $request->input('numero_documento');
        $usuLogueado     = $request->input('usu_logueado');

        if (empty($nombreEmpresa) || empty($idTipoDocumento) || empty($numeroDocumento)) {
            return response()->json([
                'success' => false,
                'message' => 'Datos incompletos para crear la empresa',
            ], 422);
        }

        try {
            $empresa = new DirigidoA();
            $empresa->dirigido_a        = mb_strtoupper(trim((string) $nombreEmpresa), 'UTF-8');
            $empresa->id_tipo_documento = $idTipoDocumento;
            $empresa->numero_documento  = $numeroDocumento;
            $empresa->usu_logueado      = $usuLogueado;
            $empresa->save();

            return response()->json([
                'success' => true,
                'message' => 'Empresa creada correctamente',
                'id_dirigido_a' => $empresa->id_dirigido_a,
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creando la empresa',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
