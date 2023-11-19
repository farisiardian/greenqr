<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'vendor_id',
        'main_category_id',
        'main_sub_category_id',
        'name',
        'description',
        'recommended',
        'sku_code',
        'product_code',
        'category_1_id',
        'category_2_id',
        'category_3_id',
        'category_4_id',
        'category_id', //last category or subcategory that has been selected
        'brand_id',
        'volumetric_id',
        'minimum_order_quantity',
        'allow_self_pickup',
        'supplier_cost_price',
        'supermarket_selling_price',
        'list_price_on_store',
        'boostProduct',
    ];


    public function image(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function mainCategory(){
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }
	
	public function subcat(){
        return $this->hasMany(MainSubCategory::class,'id','main_sub_category_id');
    }

    public function stocks(){
        return $this->hasMany(ProductStock::class, 'product_id');
    }
	
	public function vendors(){
		return $this->hasMany(User::class,'id','vendor_id');
	}
	
	public function brands(){
        return $this->hasMany(Brand::class,'id','brand_id');
    }
	
	public function ratings(){
        return $this->hasMany(OrderRating::class,'product_id','id');
    }
	
	public function variation(){
        return $this->belongsTo(ProductVariation::class,'product_id','id');
    }
	
	public function tags()
	{
		return $this->belongsTo(Tagging::class, 'id','product_id');
	}


}
