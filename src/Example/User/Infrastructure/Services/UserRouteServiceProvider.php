<?php
namespace Src\Example\User\Infrastructure\Services;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class UserRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Src\Example\User\Infrastructure\Controllers';

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
        Route::prefix('api/user')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('src/Example/User/Infrastructure/Routes/api.php'));
    }
}
