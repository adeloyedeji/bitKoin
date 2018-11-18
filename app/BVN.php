<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BVN extends Model
{
    protected $table = "b_v_ns";
    protected $fillable = [
        'user_id', 'bvn', 'phone', 'date_of_birth'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
