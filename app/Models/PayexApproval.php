<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayexApproval extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'payexapproval';

    protected $fillable = [
        'payment_id',
        'application_type',
        'approval_status',
        'approval_date',
        'reference_number',
        'mandate_reference_number',
        'record_number',
        'fpx_mode',
        'fpx_buyer_name',
        'fpx_buyer_bank_name',
        'fpx_buyer_bank_account',
        'signature',
        'txn_type',
    ];
}
