<?php

namespace App\Listeners;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

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
