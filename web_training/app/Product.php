<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;
    //

    protected $fillable = [
        'category_id',
        'product_name',
        'price',
        'sort_descriptions',
        'product_video',
        'descriptions',
        'spesifications',
    ];


    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class,'category_id','id');
    }

}
