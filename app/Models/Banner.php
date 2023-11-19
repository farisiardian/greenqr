<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'banners';

    protected $fillable = [
        'image',
        'url',
        'category_id',
    ];

//    public function mainCategory(){
//        return $this->belongsTo(MainCategory::class, 'main_category_id');
//    }

}
