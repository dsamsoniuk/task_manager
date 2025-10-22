<?php

namespace App\Providers;

use App\Repository\ProjectRepository;
use App\Repository\ProjectRepositoryInterface;
use App\Transformer\ProjectTransformer;
use App\Transformer\ProjectTransformerInterface;
use App\Transformer\UserTransformer;
use App\Transformer\UserTransformerInterface;
use App\Repository\UserRepositoryInterface;
use App\Repository\UserRepository;
use App\Service\Asserts\Constrains;
use App\Service\Asserts\ConstrainsInterface;
use App\Service\PasswordService;
use App\Service\PasswordServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ConstrainsInterface::class, Constrains::class);
        $this->app->bind(PasswordServiceInterface::class, PasswordService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(UserTransformerInterface::class, UserTransformer::class);
        $this->app->bind(ProjectTransformerInterface::class, ProjectTransformer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
