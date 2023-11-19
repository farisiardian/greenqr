<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderRating extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'order_ratings';

    protected $fillable = [
        'order_id',
        'product_id',
        'product_combination_id',
        'user_id',
        'vendor_id',
        'rating',
        'comments',
    ];
	
	public function users(){
        return $this->hasMany(User::class,'id','user_id');
    }
}
