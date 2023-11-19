<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderConsignment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'order_consignments';

    protected $fillable = [
        'order_id',
        'status',
        'order_number',
        'consignment_number',
        'awb',
        'awb_url',
        'tracking_url',
        'price',
    ];
}
