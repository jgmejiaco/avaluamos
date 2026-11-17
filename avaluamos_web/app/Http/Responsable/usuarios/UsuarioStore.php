<?php

namespace App\Http\Responsable\usuarios;

use App\Models\Usuario;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Hash;

class UsuarioStore implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $nombres         = request('nombres', null);
        $apellidos       = request('apellidos', null);
        $idTipoDocumento = request('id_tipo_documento', null);
        $numeroDocumento = request('numero_documento', null);
        $correo          = request('correo', null);
        $celular         = request('celular', null);
        $idCargo         = request('id_cargo', null);
        $idRol           = request('id_rol', null);
        $idEstado        = 1;

        // ===================================================================

        // Contruimos el nombre de usuario
        $separar_apellidos = explode(" ", $apellidos);
        $usuario           = substr($this->quitarCaracteresEspeciales(trim($nombres)), 0,1) . trim($this->quitarCaracteresEspeciales($separar_apellidos[0]));
        $usuario           = str_replace(['Ñ', 'ñ'], 'n', $usuario);
        $usuario           = strtolower($usuario);
        $complemento = "";

        while($this->consultaUsuario($usuario.$complemento)) {
            $complemento++;
        }

        // ===================================================================

        try {
            $nuevoUsuario = Usuario::create([
                'nombre_usuario'    => $usuario.$complemento,
                'clave'             => Hash::make($numeroDocumento),
                'clave_fallas'      => 0,
                'nombres'           => strtoupper($nombres),
                'apellidos'         => strtoupper($apellidos),
                'id_tipo_documento' => $idTipoDocumento,
                'numero_documento'  => $numeroDocumento,
                'id_estado'         => $idEstado,
                'id_rol'            => $idRol,
                'id_cargo'          => $idCargo,
                'correo'            => $correo,
                'celular'           => $celular,
            ]);

            if($nuevoUsuario) {
                alert()->success('Successful Process', 'Usuario creado satisfactoriamente: ' . $nuevoUsuario->usuario . ' y la clave es: ' . $numeroDocumento);
                return redirect()->to(route('usuarios.index'));
            }

        } catch (Exception $e) {
            // dd($e);
            alert()->error('Error', 'Ha ocurrido un error creando el usuario, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }

    // ===================================================================
    // ===================================================================

    private function consultaUsuario($usuario)
    {
        try {
            $usuario = Usuario::where('nombre_usuario', $usuario)->first();
            return $usuario;

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error UsuarioStore: '.$e->getMessage());
            alert()->error('Error cargando los usuarios.');

            return redirect()->route('inicio');
        }
    }
}

