<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'payments';

    protected $fillable = [
        'user_id',
        'address_id',
        'voucher_id',
        'cart_total',
        'shipping_total',
        'voucher_total',
        'total_payment',
        'transaction_id',
        'txn_id',
        'status',
        'service_charge',
        'total_weight',
    ];
}
