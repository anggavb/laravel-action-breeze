<?php

namespace App\Actions\Email;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;

class VerifyEmailPageAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->get('/verify-email', self::class)->name('verification.notice');
    }

    public function getControllerMiddleware(): array
    {
        return ['auth'];
    }

    public function handle(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(route('dashboard', absolute: false))
                    : Inertia::render('Auth/VerifyEmail', ['status' => session('status')]);
    }
}
