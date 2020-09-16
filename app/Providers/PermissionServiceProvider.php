<?php

namespace App\Providers;

use App\Permission;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            Permission::get()->map(function (Permission $permission) {
                Gate::define($permission->slug, function (User $user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            })
            ;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}
