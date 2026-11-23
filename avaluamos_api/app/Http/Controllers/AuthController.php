<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'usuario' => 'required|string',
            'clave'   => 'required|string',
        ]);

        $usuario = Usuario::where('nombre_usuario', $request->input('usuario'))->first();

        if (! $usuario) {
            return response()->json([
                'status'  => 'error',
                'code'    => 'no_existe',
                'message' => 'No hay registro de este usuario.',
            ], 401);
        }

        if ((int) $usuario->clave_fallas >= 4) {
            $usuario->id_estado = 2;
            $usuario->save();
        }

        if ((int) $usuario->id_estado === 2) {
            return response()->json([
                'status'  => 'error',
                'code'    => 'inactivo',
                'message' => 'El usuario está inactivo.',
            ], 401);
        }

        $credentials = [
            'nombre_usuario' => $usuario->nombre_usuario,
            'password'       => $request->input('clave'),
        ];

        if (! $token = Auth::attempt($credentials)) {
            $usuario->clave_fallas = (int) $usuario->clave_fallas + 1;
            $usuario->save();

            return response()->json([
                'status'  => 'error',
                'code'    => 'credenciales',
                'message' => 'Credenciales inválidas.',
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json([
            'status' => 'success',
            'data'   => Auth::user(),
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'status'  => 'success',
            'message' => 'Sesión cerrada correctamente.',
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    protected function respondWithToken($token)
    {
        /** @var Usuario $authUser */
        $authUser = Auth::user();

        if (! $authUser instanceof Usuario) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Usuario no autenticado.',
            ], 401);
        }

        $this->asignarRolDesdeId($authUser, (int) ($authUser->id_rol ?? 0));

        $authUser->loadMissing('roles', 'permissions');

        $nombreRol = $authUser->getRoleNames()->first() ?: '';
        $permisosRutas = $authUser->getAllPermissions()->pluck('name')->values()->all();
        $esAdministrador = $authUser->hasRole('Administrador');

        $usuario = Usuario::leftJoin('roles', 'roles.id', '=', 'usuarios.id_rol')
            ->where('usuarios.id_usuario', $authUser->id_usuario)
            ->select(
                'usuarios.id_usuario',
                'usuarios.nombre_usuario',
                'usuarios.nombres',
                'usuarios.apellidos',
                'usuarios.id_rol',
                'roles.name as nombre_rol'
            )
            ->first();

        if ($usuario) {
            $usuario->nombre_rol = $nombreRol ?: ($usuario->nombre_rol ?? '');
            $usuario->es_administrador = $esAdministrador;
            $usuario->permisos_rutas = $permisosRutas;
            $usuario->roles_spatie = $authUser->getRoleNames()->values()->all();
        }

        return response()->json([
            'status'       => 'success',
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => Auth::factory()->getTTL() * 60,
            'usuario'      => $usuario,
        ]);
    }

    /**
     * id_rol apunta a roles.id (Spatie). Sincroniza model_has_roles.
     */
    private function asignarRolDesdeId(Usuario $usuario, int $idRol): void
    {
        if ($idRol <= 0) {
            return;
        }

        $rol = Role::where('guard_name', 'web')->find($idRol);

        if (! $rol) {
            return;
        }

        if (! $usuario->hasRole($rol->name)) {
            $usuario->syncRoles([$rol->name]);
        }
    }
}
