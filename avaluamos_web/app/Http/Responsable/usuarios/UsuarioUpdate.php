<?php

namespace App\Http\Responsable\usuarios;

use App\Models\Usuario;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class UsuarioUpdate implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idUsuario    = request('id_usuario', null);
        $usuNombres   = $this->formatoNombrePropio(request('usu_nombres', null));
        $usuApellidos = $this->formatoNombrePropio(request('usu_apellidos', null));
        $usuCargo     = request('usu_cargo', null);
        $usuRol       = request('usu_rol', null);
        $usuIdDoc     = request('usu_id_doc', null);
        $usuDocumento = request('usu_documento', null);
        $usuCorreo    = request('usu_correo', null);
        $usuCelular   = request('usu_celular', null);
        $usuEstado    = request('usu_estado', null);
        
        // ===================================================================

        try {
            $editarUsuario = Usuario::where('id_usuario', $idUsuario)
                ->update([
                    'nombres'           => $usuNombres,
                    'apellidos'         => $usuApellidos,
                    'id_tipo_documento' => $usuIdDoc,
                    'numero_documento'  => $usuDocumento,
                    'id_rol'            => $usuRol,
                    'id_cargo'          => $usuCargo,
                    'correo'            => $usuCorreo,
                    'celular'           => $usuCelular,
                    'id_estado'         => $usuEstado,
            ]);

            if($editarUsuario) {
                alert()->success('Proceso Exitoso', 'Usuario editado satisfactoriamente');
                return redirect()->to(route('usuarios.index'));

            }

        } catch (Exception $e) {
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
