<?php

namespace App\Http\Controllers\Admin;

use App\SocialNetworkBadge;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SocialNetworkBadgeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.social-badge.list', ['only' => ['index']]);
        $this->middleware('can:admin.social-badge.edit', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $badges = SocialNetworkBadge::paginate(15);
        return view('admin.social-network-badge.index', ['socialNetworkBadges' => $badges]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social-network-badge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|unique:social_network_badges|string|max:255',
            'pattern' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
        SocialNetworkBadge::create($data);
        return redirect()->route('admin.social-network-badge.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SocialNetworkBadge $socialNetworkBadge
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialNetworkBadge $socialNetworkBadge)
    {
        return view('admin.social-network-badge.edit', ['socialNetworkBadge' => $socialNetworkBadge]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SocialNetworkBadge $socialNetworkBadge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialNetworkBadge $socialNetworkBadge)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'pattern' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
        $socialNetworkBadge->update($data);
        return redirect()->route('admin.social-network-badge.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SocialNetworkBadge $socialNetworkBadge
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialNetworkBadge $socialNetworkBadge)
    {
        $socialNetworkBadge->delete();
        return redirect()->route('admin.social-network-badge.index');
    }
}
