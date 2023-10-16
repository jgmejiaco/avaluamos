<?php

namespace App\Http\Responsable\admin;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class UsuarioUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idUsuario = request('id_usuario', null);
        $usuNombres = strtoupper(request('usu_nombres', null));
        $usuApellidos = strtoupper(request('usu_apellidos', null));
        $usuCargo = request('usu_cargo', null);
        $usuRol = request('usu_rol', null);
        $usuIdDoc = request('usu_id_doc', null);
        $usuDocumento = request('usu_documento', null);
        $usuCorreo = request('usu_correo', null);
        $usuCelular = request('usu_celular', null);
        $usuEstado = request('usu_estado', null);
        
        // ===================================================================

        $hoy = Carbon::now();

        if ($usuEstado == 2 || $usuEstado == "2") {
            $deletedAt = $hoy;
        } else {
            $deletedAt =  null;
        }
        
        // ===================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarUsuario = Usuario::where('id_usuario', $idUsuario)
                ->update([
                    'nombres' => $usuNombres,
                    'apellidos' => $usuApellidos,
                    'id_tipo_documento' => $usuIdDoc,
                    'numero_documento' => $usuDocumento,
                    'id_rol' => $usuRol,
                    'id_cargo' => $usuCargo,
                    'correo' => $usuCorreo,
                    'celular' => $usuCelular,
                    'id_estado' => $usuEstado,
                    'deleted_at' => $deletedAt,
            ]);

            if($editarUsuario)
            {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Usuario editado satisfactoriamente');
                return redirect()->to(route('administrador.index'));

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar el usuario, por favor contacte a Soporte.');
                return redirect()->to(route('administrador.index'));
            }

        } catch (Exception $e) {
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
