<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'America/Bogota'));

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->withFacades();

if ($app->environment() !== 'production') {
    $app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);
}

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->configure('app');
date_default_timezone_set($app->make('config')->get('app.timezone', 'America/Bogota'));
$app->configure('auth');
$app->configure('database');
$app->configure('cache');
$app->withEloquent();
$app->configure('services');
$app->configure('audit');
$app->configure('cors');
$app->configure('permission');

$app->middleware([
    \Illuminate\Http\Middleware\HandleCors::class,
]);

$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class,
    'auth_or_app_key' => App\Http\Middleware\AuthenticateOrAppKey::class,
]);

$app->register(Illuminate\Cache\CacheServiceProvider::class);
$app->register(App\Providers\AuthServiceProvider::class);
$app->register(Tymon\JWTAuth\Providers\LumenServiceProvider::class);
$app->register(OwenIt\Auditing\AuditingServiceProvider::class);
$app->register(Spatie\Permission\PermissionServiceProvider::class);

$app->alias('cache', Illuminate\Cache\CacheManager::class);

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;
