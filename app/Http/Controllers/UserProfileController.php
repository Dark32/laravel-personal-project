<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserProfileResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{

    public function index()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    public function show(User $user)
    {
        $user = $user->load(['userSocialNetworkBadges.socialBadge']);
        return view('user.profile', ['user' => $user]);
    }

    public function list()
    {
        $users = User::with(['userProfile', 'userSocialNetworkBadges', 'userSocialNetworkBadges.socialBadge', 'roles'])
            ->paginate(15)
        ;
        return view('user.list', ['users' => $users]);
    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.profile-edit', ['user' => $user]);
    }

    public function updateNameAndPass(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'old_pass' => 'nullable|string|max:255|different:new_pass',
            'new_pass' => 'nullable|string|max:255||same:new_pass_retry',
            'new_pass_retry' => 'nullable|string|max:255|same:new_pass',
        ]);
        // return $data;
    }

    public function vueEdit()
    {
        $user = auth()->user()->load([
            'userSocialNetworkBadges:id,user_id,social_network_badge_id,link',
            'userSocialNetworkBadges.socialBadge:id,name,icon',
        ])
        ;
        return UserProfileResource::make($user);
    }
}
