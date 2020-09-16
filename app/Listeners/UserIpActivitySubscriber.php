<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\UserIpActivity;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Events\Dispatcher;

class UserIpActivitySubscriber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * @param Registered $event
     */
    public function handleRegistered(Registered $event)
    {
        if ($event->user instanceof User) {
            $user = $event->user;
            $user->userIpActivity()->create([
                'event' => 'Registered',
                'ip' => request()->ip(),
            ])
            ;
        }
    }

    /**
     * @param Login $event
     */
    public function handleLogin(Login $event)
    {
        if ($event->user instanceof User) {
            $user = $event->user;
            $user->userIpActivity()->create([
                'event' => 'Login',
                'ip' => request()->ip(),
            ])
            ;
        }
    }

    /**
     * @param Logout $event
     */
    public function handleLogout(Logout $event)
    {
        if ($event->user instanceof User) {
            $user = $event->user;
            $user->userIpActivity()->create([
                'event' => 'Logout',
                'ip' => request()->ip(),
            ])
            ;
        }
    }

    /**
     * @param Failed $event
     */
    public function handleFailed(Failed $event)
    {
        $userId = null;
        if ($event->user instanceof User) {
            $userId = $event->user->id;
        }

        UserIpActivity::create([
            'user_id' => $userId,
            'event' => 'Failed',
            'ip' => request()->ip(),
            'extra' => json_encode($event->credentials),
        ]);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            Login::class,
            'App\Listeners\UserIpActivitySubscriber@handleLogin'
        );
        $events->listen(
            Registered::class,
            'App\Listeners\UserIpActivitySubscriber@handleRegistered'
        );
        $events->listen(
            Logout::class,
            'App\Listeners\UserIpActivitySubscriber@handleLogout'
        );
        $events->listen(
            Failed::class,
            'App\Listeners\UserIpActivitySubscriber@handleFailed'
        );
    }

}
