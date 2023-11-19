<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'promotions';

    protected $fillable = [
        'product_id',
        'main_category_id',
        'main_sub_category_id',
        'title',
        'description',
        'image',
    ];
}
