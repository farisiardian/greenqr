<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'user_address';

    protected $fillable = [
        'user_id',
        'phone',
        'name',
        'email',
        'address',
        'postalcode',
        'city',
        'state',
        'default_address',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function stateCode(){
        return $this->belongsTo(State::class, 'state','name');
    }
}
