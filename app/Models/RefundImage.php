<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefundImage extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'refund_product_images';

    protected $fillable = [
        'id',
        'return_request_id',
        'product_variation_value_id',
        'product_id',
        'image',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
