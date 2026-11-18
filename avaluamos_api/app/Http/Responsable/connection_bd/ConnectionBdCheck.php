<?php

namespace App\Http\Responsable\connection_bd;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class ConnectionBdCheck implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::connection()->getPdo();

            return response()->json([
                'status' => 'ok',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'La API no pudo conectar con la base de datos.',
            ], 503);
        }
    }
}
