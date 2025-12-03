<?php

namespace App\Actions\Password;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdatePasswordAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->put('/password', self::class)->name('password.update');
    }

    public function getControllerMiddleware(): array
    {
        return ['auth'];
    }

    public function rules(): array
    {
        return [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ];
    }

    public function handle($request)
    {
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);
    }

    public function asController(Request $request)
    {
        $this->handle($request);

        return back();
    }
}
