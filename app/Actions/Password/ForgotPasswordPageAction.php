<?php

namespace App\Actions\Pasword;

use Inertia\Inertia;
use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;

class ForgotPasswordPageAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->get('/forgot-password', self::class)->name('password.request');
    }

    public function getControllerMiddleware(): array
    {
        return ['guest'];
    }

    public function handle()
    {
        return Inertia::render('Auth/ForgotPassword', [
            'status' => session('status'),
        ]);
    }
}
