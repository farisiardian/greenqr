<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBank extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'user_banks';

    protected $fillable = [
        'user_id',
        'name',
        'acc_num',
        'holder',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
