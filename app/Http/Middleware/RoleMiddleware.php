<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param $role
     * @param null $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (! auth()->user() instanceof User) {
            abort(404);
        }
        /**
         * @var User $user
         */
        $user = auth()->user();
        if (! $user->hasRole($role)) {
            abort(404);
        }
        if ($permission !== null && ! $user->can($permission)) {
            abort(404);
        }
        return $next($request);
    }
}
