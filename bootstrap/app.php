<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web([]); // Для web-маршрутов
        $middleware->api([
            \App\Http\Middleware\ForceJsonResponse::class,
        ]);
        $middleware->alias([
            'json.response' => \App\Http\Middleware\ForceJsonResponse::class,
            'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (ModelNotFoundException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Record not found',
                    'errors' => ['id' => 'The requested resource does not exist']
                ], 404);
            }
        });

        $exceptions->render(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Endpoint not found',
                    'errors' => ['url' => 'Invalid API route']
                ], 404);
            }
        });
    })->create();

RateLimiter::for('api', function (Request $request) {
return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
});