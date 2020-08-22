<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserIpActivityListResource;
use App\UserIpActivity;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserIpActivityListController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {

        return view('admin.user-ip-activiti-list');
    }

    public function vue()
    {
        $column = request('column', 'id');
        $order = request('order', 'desc');
        $perPage = request('per_page', 15);

        $user = request('user');
        $email = request('email');
        $event = request('event');
        $ip = request('ip');
        $query = UserIpActivity::with('user')->orderBy($column, $order);

        if (isset($user) || isset($email)) {
            $query->whereHas('user', function (Builder $query) use ($user, $email) {
                if (isset($user)) {
                    $query->where('name', 'LIKE', "%{$user}%");
                }
                if (isset($email)) {
                    $query->where('email', 'LIKE', "%{$email}%");
                }
                return $query;
            });
        }
        if (isset($ip)) {
            $query->where('ip', 'LIKE', "%{$ip}%");
        }
        if (isset($event)) {
            $query->where('event', 'LIKE', "%{$event}%");
        }
        $users = $query->paginate($perPage);

        return UserIpActivityListResource::collection($users);
    }
}
