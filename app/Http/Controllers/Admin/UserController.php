<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'blocked', 'user']);
    }

    public function index(Request $request)
    {
        $users = \App\User::where('role_id', 1)->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function getProfile(Request $request, $username)
    {
        $user = \App\User::where('uname', $username)->first();

        return view('admin.users.show', compact('user'));
    }

    public function blockAccount(Request $request)
    {
        $user = \App\User::find($request->user);

        if(!$user)
        {
            \Session::flash('error', 'User not found!');
            return redirect()->back();
        }

        $user->update([
            'status'    => 3
        ]);

        \Session::flash('success', 'Account successfully blocked.');
        return redirect()->back();
    }

    public function unblockAccount(Request $request)
    {
        $user = \App\User::find($request->user);

        if(!$user)
        {
            \Session::flash('error', 'User not found!');
            return redirect()->back();
        }

        if($user->phone && $user->bvn && $user->cash_account)
        {
            $user->update([
                'status'    => 2
            ]);
        }
        else if($user->email_verified_at)
        {
            $user->update([
                'status'    => 1
            ]);
        }
        else
        {
            $user->update([
                'status'    => 0
            ]);
        }

        \Session::flash('success', 'Account was successfully unlocked.');
        return redirect()->back();
    }

    public function deleteAccount(Request $request)
    {
        $user = \App\User::find($request->uid);

        if(!$user)
        {
            \Session::flash('error', 'User not found!');
            return redirect()->back();
        }

        $user->cash_account()->delete();
        $user->bvn()->delete();
        $user->bitcoin_wallet()->delete();

        \Session::flash('success', 'Account successfully deleted.');
        return redirect()->route('admin.dashboard');
    }
}
