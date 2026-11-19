<?php

namespace App\Http\Responsable\cliente_potencial;

use App\Models\Cliente;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class ClientePotencialStore implements Responsable
{
    public function toResponse($request)
    {
        $cliNombres         = $request->input('nombre_solicitante');
        $idDocCliente       = $request->input('id_doc_cliente');
        $documentoCliente   = $request->input('documento_cliente');
        $fechaNacimiento    = $request->input('fecha_nacimiento');
        $cliCelular         = $request->input('celular');
        $cliEmail           = $request->input('correo');
        $idTipoPersona      = $request->input('tipo_persona');
        $idPais             = $request->input('pais');
        $idDepartamento     = $request->input('departamento');
        $idCiudad           = $request->input('municipio');
        $idReferidoPor      = $request->input('id_referido_por');
        $idRedSocial        = $request->input('id_red_social');
        $nombreQuienRefiere = $request->input('nombre_quien_refiere');
        $empresaQueRefiere  = $request->input('empresa_que_refiere');
        $usuLogueado        = $request->input('usu_logueado');

        if (empty($cliNombres) || empty($cliCelular) || empty($cliEmail) || empty($idTipoPersona) || empty($idReferidoPor)) {
            return response()->json([
                'success' => false,
                'message' => 'Datos incompletos para crear el cliente',
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
            $cliente = new Cliente();
            $cliente->cli_nombres          = $this->formatoNombrePropio((string) $cliNombres);
            $cliente->id_doc_cliente       = $idDocCliente;
            $cliente->documento_cliente    = $documentoCliente !== null
                ? mb_strtoupper(trim((string) $documentoCliente), 'UTF-8')
                : null;
            $cliente->fecha_nacimiento     = $fechaNacimiento;
            $cliente->cli_celular          = $cliCelular;
            $cliente->cli_email            = $cliEmail;
            $cliente->id_tipo_persona      = $idTipoPersona;
            $cliente->id_pais              = $idPais;
            $cliente->id_dpto_estado       = $idDepartamento;
            $cliente->id_ciudad            = $idCiudad;
            $cliente->id_referido_por      = $idReferidoPor;
            $cliente->id_red_social        = $idRedSocial;
            $cliente->nombre_quien_refiere = $nombreQuienRefiere;
            $cliente->empresa_que_refiere  = $empresaQueRefiere;
            $cliente->usu_logueado         = $usuLogueado;
            $cliente->save();

            return response()->json([
                'success'    => true,
                'message'    => 'Cliente creado correctamente',
                'id_cliente' => $cliente->id_cliente,
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creando el cliente',
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
