<?php

namespace App\Actions\Login;

use Inertia\Inertia;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Lorisleiva\Actions\Concerns\AsAction;

class LoginPageAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->get('/login', self::class)->name('login');
    }

    public function getControllerMiddleware(): array
    {
        return ['guest'];
    }

    public function handle()
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }
}
