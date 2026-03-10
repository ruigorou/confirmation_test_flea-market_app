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
        'condition_id',
        'user_id',
    ];

    public function product_categories() {
        return $this->belongsToMany(ProductCategory::class, 'product_product_category');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}

