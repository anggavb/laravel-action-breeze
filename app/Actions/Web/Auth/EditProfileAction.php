<?php

namespace App\Actions\Web\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class EditProfileAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->get('/profile', self::class)->name('profile.edit');
    }

    public function getControllerMiddleware(): array
    {
        return ['auth'];
    }

    public function handle(Request $request)
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }
}
