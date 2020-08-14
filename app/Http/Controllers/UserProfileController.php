<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = __('site.title_profile');

        $title = $this->title;
        $auth_user = Auth::user();

        return dump($auth_user->profile);
    }
    public function show(User $user)
    {
        return $user->profile;
    }

}
