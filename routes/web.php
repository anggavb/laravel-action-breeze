<?php

use Lorisleiva\Actions\Facades\Actions;

Actions::registerRoutes([
    'App\Actions\Web',
]);

require __DIR__.'/auth.php';
