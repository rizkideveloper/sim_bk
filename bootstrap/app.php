<?php

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsBK;
use App\Http\Middleware\IsWaliKelas;
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
        // mengarahkan user yang belum terautentikasi
        $middleware->redirectGuestsTo(fn (Request $request) => route('login.index'));

        $middleware->alias([
        'admin' => IsAdmin::class,
        'BK' => IsBK::class,
        'WaliKelas' => IsWaliKelas::class
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
