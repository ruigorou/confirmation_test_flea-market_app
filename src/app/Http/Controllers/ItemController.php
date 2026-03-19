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

    public function search (Request $request) {
        if(!empty($request->keyword)) {
            $products = Product::where(
                'product_name',  'LIKE', '%' . $request->keyword . '%'
            )->get();
            return view('top', compact('products'));
        }else{
            return redirect()->route('top');
        }
    }
    
    //--------ログイン後----------
     public function index () {
        $products = Product::where('user_id', '!=', auth()->id())->get();
        return view('product_mylist', compact('products'));
    }

    public function item_search(Request $request) {
        if(!empty($request->keyword)) {
            $products = Product::where(
                'product_name',  'LIKE', '%' . $request->keyword . '%'
            )->get();
            return view('product_mylist', compact('products'));
        }else{
            return redirect()->route('item');
        }
    }
}
