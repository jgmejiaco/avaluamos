<?php

namespace App\Http\Responsable\cliente_potencial;

use App\Models\Cliente;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ClientePotencialUpdate implements Responsable
{
    protected $idClientePotencial;

    public function __construct($idClientePotencial)
    {
        $this->idClientePotencial = $idClientePotencial;
    }

    public function toResponse($request)
    {
        $cliente = Cliente::where('id_cliente', $this->idClientePotencial)->first();

        if (! $cliente) {
            return response()->json([
                'success' => false,
                'message' => 'No existe el cliente',
            ], 404);
        }

        $nombreSolicitante  = $request->input('nombre_solicitante');
        $idDocCliente       = $request->input('id_doc_cliente');
        $documentoCliente   = $request->input('documento_cliente');
        $fechaNacimiento    = $request->input('fecha_nacimiento');
        $celular            = $request->input('celular');
        $correo             = $request->input('correo');
        $tipoPersona        = $request->input('tipo_persona');
        $pais               = $request->input('pais');
        $departamento       = $request->input('departamento');
        $municipio          = $request->input('municipio');
        $idReferidoPor      = $request->input('id_referido_por');
        $idRedSocial        = $request->input('id_red_social');
        $nombreQuienRefiere = $request->input('nombre_quien_refiere');
        $empresaQueRefiere  = $request->input('empresa_que_refiere');

        if (empty($nombreSolicitante) || empty($celular) || empty($correo) || empty($tipoPersona) || empty($idReferidoPor)) {
            return response()->json([
                'success' => false,
                'message' => 'Datos incompletos para editar el cliente',
            ], 422);
        }

        if (! empty($fechaNacimiento)) {
            $fechaNacimiento = is_numeric($fechaNacimiento)
                ? (int) $fechaNacimiento
                : strtotime($fechaNacimiento);
        } else {
            $fechaNacimiento = null;
        }

        try {
            $cliente->cli_nombres          = $this->formatoNombrePropio((string) $nombreSolicitante);
            $cliente->id_doc_cliente       = $idDocCliente;
            $cliente->documento_cliente    = $documentoCliente !== null
                ? mb_strtoupper(trim((string) $documentoCliente), 'UTF-8')
                : null;
            $cliente->fecha_nacimiento     = $fechaNacimiento;
            $cliente->cli_celular          = $celular;
            $cliente->cli_email            = $correo;
            $cliente->id_tipo_persona      = $tipoPersona;
            $cliente->id_pais              = $pais;
            $cliente->id_dpto_estado       = $departamento;
            $cliente->id_ciudad            = $municipio;
            $cliente->id_referido_por      = $idReferidoPor;
            $cliente->id_red_social        = $idRedSocial;
            $cliente->nombre_quien_refiere = $nombreQuienRefiere;
            $cliente->empresa_que_refiere  = $empresaQueRefiere;
            $cliente->save();

            return response()->json([
                'success' => true,
                'message' => 'Cliente editado correctamente',
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error actualizando el cliente',
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
