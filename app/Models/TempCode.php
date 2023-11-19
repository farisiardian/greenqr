<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempCode extends Model
{
    use HasFactory;


    protected $table = 'tempcode';

    protected $fillable = [
        'email',
        'code',
    ];

}
