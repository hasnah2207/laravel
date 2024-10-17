<?php

use App\Http\Middleware\LogMiddleWare;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->redirectGuestsTo(fn (Request $request) => route('auth.signin'));
        $middleware->redirectUsersTo(fn (Request $request) => route('feeds'));

        $middleware->alias([
            'log-request' => LogMiddleWare::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
