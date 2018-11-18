<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'blocked', 'user']);
    }

    public function dashboard(Request $request)
    {
        // $users = \App\User::where('role_id', 1)->paginate(20);
        $users = \App\User::paginate(20);
        return view('admin.dashboard', compact('users'));
    }
}
