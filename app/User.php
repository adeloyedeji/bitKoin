<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uname', 'fname', 'lname', 'phone', 'date_of_birth', 'email', 'password', 'role_id', 'status'
    ];

    // by default status = 0
    // 0 - email not yet verified
    // 1 - email verified
    // 2 - account verified
    // 3 - account blocked

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cash_account()
    {
        return $this->hasOne(CashAccount::class);
    }

    public function bvn()
    {
        return $this->hasOne(BVN::class);
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function bitcoin_wallet()
    {
        return $this->hasOne(BitcoinWallet::class);
    }
}
