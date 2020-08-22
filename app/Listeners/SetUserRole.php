<?php

namespace App\Listeners;

use App\Role;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetUserRole
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $role = Role::whereSlug('user')->first();
        if ($event->user instanceof User && $role) {
            $user = $event->user;
            $user->roles()->attach($role);
        }
    }
}
