<?php

namespace App\Actions\Email;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;

class VerificationNotificationAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->post('/email/verification-notification', self::class)->name('verification.send');
    }

    public function getControllerMiddleware(): array
    {
        return ['auth', 'throttle:6,1'];
    }

    public function handle(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
