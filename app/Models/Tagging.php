<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tagging extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'tagging';

    protected $fillable = [
        'product_id',
        'tag_name',
    ];
}
