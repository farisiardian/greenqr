<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table  = 'staff';

    protected $fillable = [
        'staff_id',
        'name',
        'email',
        'dept',
        'position',
        'status',
        'registered_dated',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
