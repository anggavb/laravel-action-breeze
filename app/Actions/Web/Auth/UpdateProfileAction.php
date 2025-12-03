<?php

namespace App\Actions\Web\Auth;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Redirect;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Requests\ProfileUpdateRequest;

class UpdateProfileAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->patch('/profile', self::class)->name('profile.update');
    }

    public function getControllerMiddleware(): array
    {
        return ['auth'];
    }

    public function handle($request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
    }

    public function asController(ProfileUpdateRequest $request)
    {
        $this->handle($request);

        return Redirect::route('profile.edit');
    }
}
