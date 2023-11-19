<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReturnRequest extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'return_request';

    protected $fillable = [
        'user_id',
        'vendor_id',
        'order_id',
        'status_r',
        'reason',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
