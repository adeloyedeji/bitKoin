<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitcoinWallet extends Model
{
    protected $fillable = [
        'user_id', 'balance'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(BitcoinWalletTransaction::class);
    }
}
