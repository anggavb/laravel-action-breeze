<?php

namespace App\Actions\Email;

use Illuminate\Routing\Router;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->get('/verify-email/{id}/{hash}', self::class)->name('verification.verify');
    }

    public function getControllerMiddleware(): array
    {
        return ['auth', 'signed', 'throttle:6,1'];
    }

    public function handle(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
