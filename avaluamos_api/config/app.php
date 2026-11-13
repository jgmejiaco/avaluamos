<?php

return [
    'name' => env('APP_NAME', 'avaluamos'),
    'env' => env('APP_ENV', 'local'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => env('APP_TIMEZONE', 'America/Bogota'),
    'locale' => 'es',
    'fallback_locale' => 'es',
    'key' => env('APP_KEY'),
    'cipher' => 'AES-256-CBC',
];
