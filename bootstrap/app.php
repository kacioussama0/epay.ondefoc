<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (Throwable $e, $request) {

            if ($request->expectsJson()) {
                return null;
            }

            if ($e instanceof AuthenticationException) {
                $code = 401;
                $message = 'الوصول غير مصرح به';
            }
            elseif ($e instanceof HttpExceptionInterface) {
                $code = $e->getStatusCode();
                $messages = [
                    401 => 'وصول غير مصرح به',
                    403 => 'غير مسموح',
                    404 => 'الصفحة غير موجودة',
                    419 => 'انتهت صلاحية الصفحة',
                    500 => 'خطأ في الخادم',
                ];
                $message = $messages[$code] ?? 'حدث خطأ ما';
            }
            // أي Exception عادية → 500
            else {
                $code = 500;
                $message = 'Server error';
            }

            return response()->view('errors.custom', compact('code', 'message'), $code);
        });
    })->create();
