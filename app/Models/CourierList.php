<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourierList extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'courier_list';

    protected $fillable = [
        'serviceId',
        'serviceName',
        'courierId',
        'courierName',
    ];
}
