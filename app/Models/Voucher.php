<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'vouchers';

    protected $fillable = [
        'vendor_id',
        'product_id',
        'value',
        'unit_value',
        'name',
        'unique_code',
        'capped',
        'start_at',
        'end_at',
    ];

    public function productImage(){
        return $this->belongsTo(ProductImage::class, 'product_id','product_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
