<?php

namespace App\Http\Responsable\permisos;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Responsable;
use App\Models\Rol;

class PermisoUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idRol = request('id_rol', null);
        $modUsuario = request('mod_usuario', null);
        $modClientes = request('mod_clientes', null);
        $modCalendario = request('mod_calendario', null);
        $modVisitas = request('mod_visitas', null);
        $modAvaluo = request('mod_avaluo', null);
        $modInformes = request('mod_informes', null);

        DB::connection('mysql')->beginTransaction();

        try {
            $editarPermisoRol = Rol::where('id_rol',$idRol)
                    ->update([
                        'mod_usuario' => $modUsuario,
                        'mod_clientes' => $modClientes,
                        'mod_calendario' => $modCalendario,
                        'mod_visitas' => $modVisitas,
                        'mod_avaluo' => $modAvaluo,
                        'mod_informes' => $modInformes,
                    ]);

            if($editarPermisoRol) {
                DB::connection('mysql')->commit();
                return response()->json('permiso_editado');

            } else {
                DB::connection('mysql')->rollback();
                return response()->json('permiso_no_editado');
            }

        } catch (Exception $e) {
            dd($e);
            DB::connection('mysql')->rollback();
            return response()->json('error_exception');
        }
    }
}
