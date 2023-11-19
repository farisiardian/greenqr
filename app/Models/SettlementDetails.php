<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettlementDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'settlement_id',
        'order_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}

