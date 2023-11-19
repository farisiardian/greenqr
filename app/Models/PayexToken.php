<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayexToken extends Model
{
    use HasFactory;

    protected $table = 'payex_token';

    protected $fillable = [
        'token',
        'expiration',
    ];
}
