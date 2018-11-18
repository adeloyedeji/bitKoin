<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BTCMarket extends Model
{
    protected $fillable = [
        'type', 'price', 'minimum_amount', 'maximum_amount', 'seller_id', 'buyer_id', 'usd_amount', 'naira_amount', 'total_amount', 'status'
    ];
    // type
    // 1 - sell
    // 2 - buy

    // status 
    // 1 - open
    // 2 - active
    // 3 - confirmed
    // 4 - failed
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}
