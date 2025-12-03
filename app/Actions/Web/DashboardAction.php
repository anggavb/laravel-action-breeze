<?php

namespace App\Actions\Web;

use Inertia\Inertia;
use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;

class DashboardAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->get('/dashboard', self::class)->name('dashboard');
    }

    public function getControllerMiddleware(): array
    {
        return ['auth', 'verified'];
    }

    public function handle()
    {
        return Inertia::render('Dashboard');
    }
}
