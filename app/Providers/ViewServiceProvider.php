<?php

namespace App\Providers;

use App\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cacheKeyUserOnlineCount = 'userOnlineCount';
        $cacheKeyUserOnline = 'userOnline';
        $cacheKeyGuestOnlineCount = 'guestOnlineCount';
        View::composer(
            ['fragment.online-users'], function (\Illuminate\View\View $view) use (
            $cacheKeyUserOnlineCount,
            $cacheKeyGuestOnlineCount,
            $cacheKeyUserOnline
        ) {
            $userOnlineSessions = null;
            if (cache()->has($cacheKeyUserOnline)) {
                $userOnline = cache()->get($cacheKeyUserOnline);
            } else {
                $userOnlineSessions= Session::registered()->activity(5)->get()->unique();
                $userOnline =$userOnlineSessions;
                cache()->set($cacheKeyUserOnline, $userOnline, 1);
            }
            if (cache()->has($cacheKeyUserOnlineCount)) {
                $userOnlineCount = cache()->get($cacheKeyUserOnlineCount);
            } else {
                $userOnlineCount = $userOnlineSessions ? $userOnlineSessions->count() : Session::registered()->activity(5)->get()->unique()->count();
                cache()->set($cacheKeyUserOnlineCount, $userOnlineCount, 1);
            }
            if (cache()->has($cacheKeyGuestOnlineCount)) {
                $guestOnlineCount = cache()->get($cacheKeyGuestOnlineCount);
            } else {
                $guestOnlineCount = Session::guests()->activity(5)->count();
                cache()->set($cacheKeyGuestOnlineCount, $guestOnlineCount, 1);
            }
            // dd($userOnline);
            $view->with('userOnline', $userOnline);
            $view->with('userOnlineCount', $userOnlineCount);
            $view->with('guestOnlineCount', $guestOnlineCount);
        });
    }
}
