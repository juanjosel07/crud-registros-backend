<?php

namespace App\Exceptions;

use Themosis\Core\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
{
    if ($exception instanceof ValidationException && $request->expectsJson()) {
        return response()->json([
            'message' => 'Los datos enviados no son válidos.', 
            'errors' => $exception->errors(),
        ], 422);
    }

    return parent::render($request, $exception);
}
}
