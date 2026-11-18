<?php

namespace App\Http\Responsable\usuarios;

use App\Models\Usuario;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class UsuarioUpdate implements Responsable
{
    protected $idUsuario;

    public function __construct($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function toResponse($request)
    {
        $usuario = Usuario::find($this->idUsuario);

        if (! $usuario) {
            return response()->json([
                'success' => false,
                'message' => 'No existe usuario',
            ], 404);
        }

        try {
            $usuario->nombres           = $this->formatoNombrePropio($request->input('usu_nombres'));
            $usuario->apellidos         = $this->formatoNombrePropio($request->input('usu_apellidos'));
            $usuario->id_tipo_documento = $request->input('usu_id_doc');
            $usuario->numero_documento  = $request->input('usu_documento');
            $usuario->id_rol            = $request->input('usu_rol');
            $usuario->id_cargo          = $request->input('usu_cargo');
            $usuario->correo            = $request->input('usu_correo');
            $usuario->celular           = $request->input('usu_celular');
            $usuario->id_estado         = $request->input('usu_estado');
            $usuario->save();

            return response()->json([
                'success' => true,
                'message' => 'Usuario editado correctamente',
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error actualizando el usuario',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * JUAN GUILLERMO → Juan Guillermo | MEJÍA CORREA → Mejía Correa
     */
    private function formatoNombrePropio(?string $texto): ?string
    {
        if ($texto === null || trim($texto) === '') {
            return $texto;
        }

        return mb_convert_case(trim($texto), MB_CASE_TITLE, 'UTF-8');
    }
}
