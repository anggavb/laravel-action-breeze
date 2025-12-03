<?php

namespace App\Actions\Password;

use Inertia\Inertia;
use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;

class PasswordConfirmationPageAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->get('/confirm-password', self::class)->name('password.confirm');
    }

    public function getControllerMiddleware(): array
    {
        return ['auth'];
    }

    public function handle()
    {
        return Inertia::render('Auth/ConfirmPassword');
    }
}
