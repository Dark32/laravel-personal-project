<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\Route;

class PanelController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
