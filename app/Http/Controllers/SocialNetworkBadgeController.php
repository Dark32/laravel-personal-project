<?php

namespace App\Http\Controllers;


use App\Models\SocialNetworkBadge;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SocialNetworkBadgeController extends Controller
{
    public function find(Request $request)
    {
        if (! $request->has('q')) {
            return [];
        }
        $term = $request->q;

        if (strlen($term) < 2) {
            return [];
        }
        $query = SocialNetworkBadge::select("id", "name", 'slug', 'icon')
            ->where('slug', 'LIKE', "%{$term}%")
            ->orWhere('name', 'LIKE', "%{$term}%")
            ->limit(15)
        ;

        return response()->json($query->get());
    }
}
