<?php
namespace Src\Example\Task\Infrastructure\Services;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class TaskRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Src\Example\Task\Infrastructure\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api/task')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('src/Example/Task/Infrastructure/Routes/api.php'));
    }
}
