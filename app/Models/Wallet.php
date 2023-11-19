<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'wallets';

    protected $fillable = [
        'user_id',
        'balance',
        'balance_before',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
