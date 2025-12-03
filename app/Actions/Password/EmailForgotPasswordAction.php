<?php

namespace App\Actions\Pasword;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Password;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Validation\ValidationException;

class EmailForgotPasswordAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->post('/forgot-password', self::class)->name('password.email');
    }

    public function getControllerMiddleware(): array
    {
        return ['guest'];
    }

    public function handle(Request $request)
    {
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
        ];
    }
}
