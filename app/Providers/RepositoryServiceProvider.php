<?php

namespace App\Providers;

use App\Repositories\Interfaces\UserOnlineRepositoryInterface;
use App\Repositories\UserOnlineRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
