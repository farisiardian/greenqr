<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'vendor_id',
        'cart_id',
        'product_id',
        'product_combination_id',
        'transaction_id',
        'txn_id',
        'voucher_id',
        'cart_total',
        'shipping_total',
        'voucher_total',
        'total_payment',
        'status',
        'courier_id',
        'vendor_address_id',
        'user_address_id',
        'total_weight',
        'tracking_number',
        'reference_number',
        'admin_status',
    ];
	
	public function consignment(){
		return $this->belongsTo(OrderConsignment::class,'id','order_id');
	}
	
    public function image(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function users(){
        return $this->belongsTo(settleUser::class, 'user_id','id');
    }
    
	public function user_address(){
        return $this->belongsTo(UserAddress::class,'user_address_id','id');
    }
	
	public function vendor_address(){
        return $this->belongsTo(UserAddress::class,'vendor_address_id','id');
    }
	
    public function vendors(){
        return $this->belongsTo(User::class, 'vendor_id','id');
    }

    public function carts(){
        return $this->belongsTo(ShoppingCart::class, 'cart_id','id');
    }

    public function products(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function productImages(){
        return $this->belongsTo(ProductImage::class, 'product_id','product_id');
    }

    public function ratings(){

        return $this->hasMany(OrderRating::class, 'order_id','id');
    }

    public function payouts(){
        return $this->belongsTo(Payout::class, 'transaction_id','transaction_id');
    }
	
	public function variation(){ //combination_id
        return $this->belongsTo(ProductVariation::class,'product_combination_id','id');
    }

}
