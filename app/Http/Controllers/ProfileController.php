<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['verified', 'auth', 'blocked', 'admin'], ['except' => ['blockedAccount']]);
    }

    public function edit(Request $request)
    {
        $profile = \Auth::user();
        $year   = date('Y', strtotime($profile->date_of_birth));
        $month  = date('m', strtotime($profile->date_of_birth));
        $day    = date('d', strtotime($profile->date_of_birth));

        return view('profile', compact('profile', 'year', 'month', 'day'));
    }

    public function update(Request $request)
    {
        $data = array(
            'uname' => $request->uname,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'year'  => $request->year,
            'month' => $request->month,
            'day'   => $request->day,
        );

        if($request->password != null)
        {
            $data['password'] = $request->password;
            $validator = \Validator::make($data, [
                'uname' => 'required|string|max:191',
                'fname' => 'required|string|max:191',
                'lname' => 'required|string|max:191',
                'year'  => 'required|numeric',
                'month' => 'required|numeric',
                'day'   => 'required|numeric',
                'password'  => 'required|string|min:6|confirmed'
            ]);
        }
        else
        {
            $validator = \Validator::make($data, [
                'uname' => 'required|string|max:191',
                'fname' => 'required|string|max:191',
                'lname' => 'required|string|max:191',
                'year'  => 'required|numeric',
                'month' => 'required|numeric',
                'day'   => 'required|numeric',
            ]);
        }

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }

        $profile = array(
            'uname' => $request->uname,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'date_of_birth' => $data['year'] . '-' . $data['month'] . '-' . $data['day']
        );

        if($request->password != null)
        {
            $profile['password'] = Hash::make($data['password']);
        }

        \Auth::user()->update($profile);
        \Session::flash('success', 'Profile successfully updated.');
        return redirect()->back();
    }

    public function blockedAccount(Request $request)
    {
        return view('blocked');
    }
}
