<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopDetail extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps=false;
    protected $table = 'shop_details';

    protected $fillable = [
        'user_id',
        'tagline',
        'summary',
    ];
}




