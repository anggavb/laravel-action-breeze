<?php

namespace App\Actions\Web\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Lorisleiva\Actions\Concerns\AsAction;

class DestroyProfileAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->delete('/profile', self::class)->name('profile.destroy');
    }

    public function getControllerMiddleware(): array
    {
        return ['auth'];
    }

    public function handle($request)
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    public function rules(): array
    {
        return [
            'password' => ['required', 'current_password'],
        ];
    }

    public function asController(Request $request)
    {
        $this->handle($request);

        return Redirect::to('/');
    }
}
