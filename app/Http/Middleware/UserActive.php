<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class UserActive
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();
            $user->last_active = Carbon::now();
            $user->save();
        }
        return $next($request);
    }
}
