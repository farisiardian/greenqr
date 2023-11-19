<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'main_category';

    protected $fillable = [
        'sort_id',
        'name',
        'image',
    ];

    public function image(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function stocks(){
        return $this->hasMany(ProductStock::class, 'product_id');
    }

    public function subcat(){
        return $this->hasMany(MainSubCategory::class,'main_category_id','id');
    }
	
	public function products(){

        return $this->hasMany(Product::class, 'main_category_id','id');

    }
}
