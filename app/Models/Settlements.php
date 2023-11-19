<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settlements extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'settlements';

    protected $fillable = [
        'user_id',
        'settlement_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
