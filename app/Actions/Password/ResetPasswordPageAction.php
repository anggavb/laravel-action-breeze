<?php

namespace App\Actions\Pasword;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;

class ResetPasswordPageAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->get('/reset-password/{token}', self::class)->name('password.reset');
    }

    public function getControllerMiddleware(): array
    {
        return ['guest'];
    }

    public function handle(Request $request)
    {
        return Inertia::render('Auth/ResetPassword', [
            'email' => $request->email,
            'token' => $request->route('token'),
        ]);
    }
}
