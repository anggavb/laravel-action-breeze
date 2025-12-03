<?php

namespace App\Actions\Login;

use Illuminate\Routing\Router;
use App\Http\Requests\Auth\LoginRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class LoginUserAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->post('/login', self::class)->name('login');
    }

    public function getControllerMiddleware(): array
    {
        return ['guest'];
    }

    public function handle($request)
    {
        $request->authenticate();

        $request->session()->regenerate();
    }

    public function asController(LoginRequest $request)
    {
        $this->handle($request);

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
