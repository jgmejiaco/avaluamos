<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'usuario' => 'required|string',
            'clave' => 'required|string',
        ]);

        $usuario = Usuario::where('nombre_usuario', $request->input('usuario'))->first();

        if (! $usuario) {
            return response()->json([
                'status' => 'error',
                'code' => 'no_existe',
                'message' => 'No hay registro de este usuario.',
            ], 401);
        }

        if ((int) $usuario->clave_fallas >= 4) {
            $usuario->id_estado = 2;
            $usuario->save();
        }

        if ((int) $usuario->id_estado === 2) {
            return response()->json([
                'status' => 'error',
                'code' => 'inactivo',
                'message' => 'El usuario está inactivo.',
            ], 401);
        }

        $credentials = [
            'nombre_usuario' => $usuario->nombre_usuario,
            'password' => $request->input('clave'),
        ];

        if (! $token = Auth::attempt($credentials)) {
            $usuario->clave_fallas = (int) $usuario->clave_fallas + 1;
            $usuario->save();

            return response()->json([
                'status' => 'error',
                'code' => 'credenciales',
                'message' => 'Credenciales inválidas.',
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json([
            'status' => 'success',
            'data' => Auth::user(),
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Sesión cerrada correctamente.',
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => 'success',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'usuario' => [
                'id_usuario' => Auth::user()->id_usuario,
                'nombre_usuario' => Auth::user()->nombre_usuario,
                'id_rol' => Auth::user()->id_rol,
            ],
        ]);
    }
}
