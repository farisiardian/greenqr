<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    use HasFactory;
    protected $table = 'payout';

    protected $fillable = [
        'user_id',
        'transaction_id',
        'total_payment',
        'status',
        'payout_date',
    ];
}
