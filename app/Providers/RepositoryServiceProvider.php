<?php

namespace App\Providers;

use App\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
