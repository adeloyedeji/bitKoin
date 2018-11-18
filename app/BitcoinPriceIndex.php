<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitcoinPriceIndex extends Model
{
    protected $fillable = [
        'date', 'value'
    ];
}
