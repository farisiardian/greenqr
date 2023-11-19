<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'warehouse';

    protected $fillable = [
        'id',
        'vendor_id',
        'location',
        'warehouse_owner',
        'warehouse_name',
        'warehouse_code',
        'contact_number',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
