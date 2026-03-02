<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'price',
        'brand',
        'product_description',
        'image',
        'condition',
    ];

    public function product_categories() {
        return $this->belongsToMany(ProductCategory::class, 'product_product_category');
    }
}

