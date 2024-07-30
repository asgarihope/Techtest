<?php

namespace App\Providers;

use App\Repository\_BaseRepository;
use App\Repository\ArticleRepository;
use App\Repository\Interfaces\_BaseRepositoryInterface;
use App\Repository\Interfaces\ArticleRepositoryInterface;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class InterfaceRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(_BaseRepositoryInterface::class, _BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
