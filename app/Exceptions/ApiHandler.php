<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\JsonResponse;
use Throwable;

class ApiHandler extends ExceptionHandler
{
    public function render($request, Throwable $e): JsonResponse
    {
        if ($request->is('api/*')) {
            if ($e instanceof ModelNotFoundException) {
                return response()->json([
                    'message' => 'Record not found',
                    'errors' => ['id' => 'The requested resource does not exist']
                ], 404);
            }

            if ($e instanceof NotFoundHttpException) {
                return response()->json([
                    'message' => 'Endpoint not found',
                    'errors' => ['url' => 'Invalid API route']
                ], 404);
            }
        }

        return parent::render($request, $e);
    }
}