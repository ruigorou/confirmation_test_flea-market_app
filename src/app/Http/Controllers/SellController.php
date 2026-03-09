<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    public function listing () {
        $user_id = Auth::id();
        $conditions = Condition::all();
        $categories = ProductCategory::all();
        return view('listing', compact( 'conditions',  'categories', 'user_id'));
    }

    public function product_listing(Request $request) {
        dd($request->category_id);
        return redirect()->route('item');
    }
}
