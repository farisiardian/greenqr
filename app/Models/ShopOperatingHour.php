<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopOperatingHour extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'shop_operating_hours';

    protected $fillable = [
        'user_id',
        'days',
        'open_at',
        'close_at',
        'isClosed',
    ];
}
