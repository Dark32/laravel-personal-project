<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserSocialNetworkBadge;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UserSocialNetworkBadgesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.social-badge.list', ['only' => ['index']]);
        $this->middleware('can:admin.user.list', ['only' => ['index']]);
        $this->middleware('can:admin.social-badge.edit', ['except' => ['index']]);
        $this->middleware('can:admin.user.edit', ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $badges = UserSocialNetworkBadge::with(['user','socialBadge'])->paginate(15);
        return view('admin.user-social-badge.index', ['badges' => $badges]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.user-social-badge.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|int',
            'social_network_badge_id' => 'nullable|int',
            'link' => 'required|string|max:255',
        ]);
        UserSocialNetworkBadge::create($data);
        return redirect()->route('admin.user-social-network-badge.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param UserSocialNetworkBadge $userSocialNetworkBadge
     * @return Response
     */
    public function edit(UserSocialNetworkBadge $userSocialNetworkBadge)
    {
        return view('admin.user-social-badge.edit', ['user_social_network_badge' => $userSocialNetworkBadge]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param UserSocialNetworkBadge $userSocialNetworkBadge
     * @return Response
     */
    public function update(Request $request, UserSocialNetworkBadge $userSocialNetworkBadge)
    {

        $data = $request->validate([
            'link' => 'required|string|max:255|snb',
            'social_network_badge_id' => 'nullable|int',
        ]);
        $userSocialNetworkBadge->update($data);
        return redirect()->route('admin.user-social-network-badge.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserSocialNetworkBadge $userSocialNetworkBadge
     * @return Response
     */
    public function destroy(UserSocialNetworkBadge $userSocialNetworkBadge)
    {
        $userSocialNetworkBadge->delete();
        return redirect()->route('admin.user-social-network-badge.index')->with('success','Product deleted successfully');
    }
}
