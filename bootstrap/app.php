<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware; // <-- Pastikan baris ini ada dan tidak ada typo

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) { // <-- Pastikan 'Middleware $middleware' ada
        // Global middleware (tidak perlu mengubah ini kecuali ada kebutuhan spesifik)
        // Jika ada `$middleware->web(append: [...]);` pastikan tidak ada `role` di dalamnya
        // Contoh:
        // $middleware->web(append: [
        //     \App\Http\Middleware\TrustProxies::class,
        //     \Illuminate\Session\Middleware\StartSession::class,
        //     \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        //     \App\Http\Middleware\VerifyCsrfToken::class,
        //     \Illuminate\Routing\Middleware\SubstituteBindings::class,
        // ]);


        // Alias middleware Anda
        $middleware->alias([
            'role' => \App\Http\Middleware\CheckUserRole::class, // <-- Pastikan alias 'role' ada dan mengarah ke kelas yang benar
            // ... alias middleware lainnya
        ]);

        // Pastikan tidak ada '$middleware->group(...)' yang secara tidak sengaja menambahkan 'role' ke rute umum
        // atau ke grup 'web' jika itu bukan yang Anda inginkan.

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
