<?php

namespace App\Support;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;

class ApiClient extends Client
{
    public function __construct(array $config = [])
    {
        $pila = $config['handler'] ?? null;
        $pila = $pila instanceof HandlerStack
            ? $pila
            : HandlerStack::create(is_callable($pila) ? $pila : null);

        $pila->push(Middleware::mapRequest(function (RequestInterface $request) {
            if (! $request->hasHeader('Authorization') && ! $request->hasHeader('X-App-Api-Key')) {
                $jwt = $this->tokenDeSesion();

                if ($jwt) {
                    $request = $request->withHeader('Authorization', 'Bearer '.$jwt);
                } else {
                    $apiKey = env('APP_API_KEY');

                    if (is_string($apiKey) && $apiKey !== '') {
                        $request = $request->withHeader('X-App-Api-Key', $apiKey);
                    }
                }
            }

            if (! $request->hasHeader('Accept')) {
                $request = $request->withHeader('Accept', 'application/json');
            }

            return $request;
        }));

        $config['handler'] = $pila;

        parent::__construct($config);
    }

    private function tokenDeSesion(): ?string
    {
        try {
            if (! function_exists('session')) {
                return null;
            }

            $token = session('api_jwt_token');

            return is_string($token) && $token !== '' ? $token : null;
        } catch (\Throwable $e) {
            return null;
        }
    }
}
