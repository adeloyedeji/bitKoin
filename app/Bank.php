<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name', 'slug', 'code', 'active', 'bank_id'
    ];
}
