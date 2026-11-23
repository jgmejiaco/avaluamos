<?php

namespace App\Support;

use Illuminate\Http\Response;

class RedirectReplace
{
    /**
     * Redirige reemplazando la entrada actual del historial del navegador
     * (evita que "atrás" vuelva a login u otras pantallas de acceso).
     */
    public static function to(string $url): Response
    {
        $destino = json_encode($url, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);

        return response(
            '<!DOCTYPE html><html lang="es"><head><meta charset="utf-8">'
            .'<meta http-equiv="Cache-Control" content="no-store">'
            .'<script>window.location.replace('.$destino.');</script>'
            .'</head><body></body></html>',
            200,
            [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]
        );
    }
}
