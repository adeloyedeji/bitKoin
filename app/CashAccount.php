<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashAccount extends Model
{
    protected $fillable = [
        'user_id', 'account_no', 'bank_name', 'bank_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
