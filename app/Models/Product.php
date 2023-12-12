<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'product_name',
        'description',
        'price',
        'quantity',
        'image',
    ];

    public function getImageUrlAttribute()
    {
        return asset('uploads/products/' . $this->image); 
    }

}
