<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ControllerError extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'controllererrors';

    protected $fillable = [
        'phpfunctions',
        'phpcontrollers',
        'error',
        'line',
        'remark',
    ];

}
