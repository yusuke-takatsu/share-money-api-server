<?php

namespace App\Providers;

use App\Repositories\Common\S3Repository;
use App\Repositories\Common\S3RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(S3RepositoryInterface::class, S3Repository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
