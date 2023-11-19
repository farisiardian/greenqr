<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductStock extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'products_stock';

    protected $fillable = [
        'product_id',
        'products_combination_id',
        'total_stock',
        'supplier_cost_price',
        'supermarket_selling_price',
        'price_on_store',
        'total_supplier_cost_price',
        'total_supermarket_selling_price',
        'total_price_on_store',
        'weight',
    ];
}
