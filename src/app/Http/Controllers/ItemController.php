<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ItemController extends Controller
{
    //---------未ログイン----------
    public function top () {
        $products = Product::all();
        return view('top', compact('products'));
    }

    public function detail ($item_id) {
        $product = Product::with('product_categories', 'condition')
            ->withCount('likes')
            ->findOrFail($item_id);

        $product_categories = $product->product_categories;

        return view('product_detail', compact('product', 'product_categories'));
    }
    
    //--------ログイン後----------
     public function index () {
        $products = Product::all();
        return view('product_mylist', compact('products'));
    }
}
