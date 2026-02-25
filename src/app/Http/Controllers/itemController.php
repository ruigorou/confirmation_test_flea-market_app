<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class itemController extends Controller
{
    //---------未ログイン----------
    public function top () {
        return view('top');
    }
    
    //--------ログイン後----------
     public function index () {
        $products = Product::all();
        return view('product_list', compact('products'));
    }
}
