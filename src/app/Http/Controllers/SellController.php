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
       $data = $request->only([
            'product_name',
            'price',
            'brand',
            'product_description',
            'condition_id',
        ]);
        
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) { 
            $path = $request->file('image')->store('public/image');
            $data['image'] = basename($path);
        }
        Product::create($data);

        return redirect()->route('item');
    
    }
}
