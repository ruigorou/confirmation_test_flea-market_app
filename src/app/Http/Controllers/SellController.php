<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function listing () {
        $products = Product::all();
        $conditions = Condition::all();
        $categories = ProductCategory::all();
        return view('listing', compact('products', 'conditions',  'categories'));
    }
}
