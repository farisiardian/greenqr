<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalletHistory extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'wallet_histories';

    protected $fillable = [
        'wallet_id',
        'remark',
        'current_balance',
        'after_balance',
        'type',
        'amount',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
