<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCombination extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'products_combinations';

    protected $fillable = [
        'product_id',
        'combinations_string',
        'unique_string_id',
        'sku_id',
        'sku_code',
        'product_code',
        'price_on_store',
        'available_stock',
    ];
}
