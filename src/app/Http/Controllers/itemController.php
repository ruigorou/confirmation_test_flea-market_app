<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class itemController extends Controller
{
    public function index () {
        $products = Product::all();
        return view('product_list', compact('products'));
    }
}
