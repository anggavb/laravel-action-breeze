<?php

namespace App\Actions\Login;

use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class LogoutUserAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->post('/logout', self::class)->name('logout');
    }

    public function getControllerMiddleware(): array
    {
        return ['auth'];
    }

    public function handle($request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }

    public function asController(Request $request)
    {
        $this->handle($request);

        return redirect('/');
    }
}
