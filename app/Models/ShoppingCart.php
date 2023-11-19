<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingCart extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'shopping_carts';

    protected $fillable = [
        'user_id',
        'vendor_id',
        'product_id',
        'product_combinations_id',
        'quantity',
        'sold',
        'checked',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function productImage(){
        return $this->hasMany(ProductImage::class,'product_id','product_id');
    }
	
	 public function variation(){
        return $this->belongsTo(ProductVariation::class,'product_combinations_id','id');
    }
	 public function stocks(){
        return $this->hasMany(ProductStock::class,'product_id','product_id');
    }
}
