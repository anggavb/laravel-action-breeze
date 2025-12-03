<?php

namespace App\Actions\Register;

use Inertia\Inertia;
use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;

class RegisterPageAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->get('/register', self::class)->name('register');
    }

    public function getControllerMiddleware(): array
    {
        return ['guest'];
    }

    public function handle()
    {
        return Inertia::render('Auth/Register');
    }
}
