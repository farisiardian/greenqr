<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariationOptionsValue extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'products_variations_options_value';

    protected $fillable = [
        'products_variation_id',
        'variation_name',
    ];
}
