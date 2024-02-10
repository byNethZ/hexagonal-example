<?php

namespace Src\Example\User\Infrastructure\Services;

use Illuminate\Support\ServiceProvider;
use Src\Example\User\Application\Delete\UserDeleteByIdUseCase;
use Src\Example\User\Application\Find\UserFindAllUseCase;
use Src\Example\User\Application\Find\UserFindByIdUseCase;
use Src\Example\User\Application\Save\UserSaveUseCase;
use Src\Example\User\Domain\Contracts\UserRepositoryContract;
use Src\Example\User\Infrastructure\Repositories\Eloquent\UserRepository;

class DependencyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when([UserFindAllUseCase::class, UserFindByIdUseCase::class, UserDeleteByIdUseCase::class, UserSaveUseCase::class])
            ->needs(UserRepositoryContract::class)
            ->give(UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
