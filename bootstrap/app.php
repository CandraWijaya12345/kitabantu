<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\CheckIfAdmin::class
        ]);
        $middleware->web(append: [
            \App\Http\Middleware\UpdateUserLastSeenAt::class,
        ]);
        $middleware->validateCsrfTokens(except: [
            'api/midtrans-callback', // <-- Pastikan baris ini ada
        ]);
    })
    ->withProviders([ // <-- Tambahkan bagian ini jika belum ada
        App\Providers\MidtransServiceProvider::class,
    ], true)
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
