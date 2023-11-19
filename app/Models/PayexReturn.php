<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayexReturn extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'payexreturn';

    protected $fillable = [
        'payment_id',
        'amount',
        'currency',
        'customer_name',
        'description',
        'reference_number',
        'mandate_reference_number',
        'payment_intent',
        'collection_id',
        'invoice_id',
        'txn_id',
        'txn_date',
        'external_txn_id',
        'response',
        'auth_code',
        'auth_number',
        'fpx_mode',
        'fpx_buyer_name',
        'fpx_buyer_id',
        'fpx_buyer_bank_name',
        'card_holder_name',
        'card_number',
        'card_expiry',
        'card_brand',
        'card_on_file',
        'signature',
        'txn_type',
        'nonce',
    ];
}
