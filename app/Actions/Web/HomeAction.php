<?php

namespace App\Actions\Web;

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Application;
use Lorisleiva\Actions\Concerns\AsAction;

class HomeAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->get('/', self::class)->name('home');
    }

    public function handle()
    {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
