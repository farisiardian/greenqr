<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainSubCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'main_sub_category';

    protected $fillable = [
        'main_category_id',
        'name',
    ];

    public function products(){

        return $this->hasMany(Product::class, 'main_sub_category_id','id');

    }
}
