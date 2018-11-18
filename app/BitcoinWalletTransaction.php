<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitcoinWalletTransaction extends Model
{
    protected $fillable = [
        'bitcoin_wallet_id', 'transaction_type', 'transaction_description', 'transaction_amount', 'wallet_balance',
    ];

    public function wallet()
    {
        return $this->belongsTo(BitcoinWallet::class);
    }
}
