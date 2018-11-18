<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'uname'     => ['required', 'string', 'max:255', 'unique:users'],
            'fname'     => ['required', 'string', 'max:255'],
            'lname'     => ['required', 'string', 'max:255'],
            'year'      => ['required', 'numeric'],
            'month'     => ['required', 'numeric'],
            'day'       => ['required', 'numeric'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
            'agree'     => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'uname'         => $data['uname'],
            'lname'         => $data['lname'],
            'fname'         => $data['fname'],
            'email'         => $data['email'],
            'date_of_birth' => $data['year'] . '-' . $data['month'] . '-' . $data['day'],
            'password' => Hash::make($data['password']),
        ]);

        // create a wallet for this user.
        $user->bitcoin_wallet()->create([
            'balance'   => 0.0
        ]);

        $user->notify(new \App\Notifications\WelcomeNotification($user));
        
        return $user;
    }
}
