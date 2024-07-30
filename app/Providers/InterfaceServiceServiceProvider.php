<?php

namespace App\Providers;

use App\Services\ArticleService;
use App\Services\FibonacciService;
use App\Services\Interfaces\ArticleServiceInterface;
use App\Services\Interfaces\FibonacciServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class InterfaceServiceServiceProvider extends ServiceProvider
{
    public $bindings = [
        UserServiceInterface::class => UserService::class,
        ArticleServiceInterface::class => ArticleService::class,
        FibonacciServiceInterface::class => FibonacciService::class,

    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
