<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserEditRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserListController extends Controller
{
    public function index()
    {
        $users = User::with(['userProfile','roles','permissions','userSocialNetworkBadges','userSocialNetworkBadges.socialBadge'])->paginate(15);
        return view('admin.user-list', ['users' => $users]);
    }

    public function edit(User $user)
    {
        return view('admin.user-edit', ['user' => $user]);
    }

    public function find(Request $request)
    {
        if (! $request->has('q')) {
            return [];
        }
        $term = $request->q;

        if (strlen($term) < 2) {
            return [];
        }

        $data = User::select("id", "name", 'email')
            ->where('email', 'LIKE', "%{$term}%")
            ->orWhere('name', 'LIKE', "%{$term}%")
            ->limit(15)
            ->get()
        ;

        return response()->json($data);
    }

    public function update(UserEditRequest $request, $id)
    {
        $updateData = $request->validated();
        $user = User::whereId($id)->first();
        if (! $user) {
            return redirect()->route('admin.user.list');
        }
        $user->update($updateData);
        if ($user->userProfile) {
            $user->userProfile->update($updateData);
        } else {
            $user->userProfile()->create($updateData);
        }
        if (isset($updateData['roles'])) {
            $user->roles()->sync($updateData['roles']);
        }
        if (isset($updateData['permissions'])) {
            $user->permissions()->sync($updateData['permissions']);
        }

        return redirect()->route('admin.user.list');
    }
}
