<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    //---------未ログイン----------
    public function top (Request $request) {
        $products = Product::all();
        $page = $request->query('page');
        $user = auth()->user();
        if(auth()->check()) {
            //------login---------
            $likedProductIds = Like::where('user_id', $user->id)
            ->pluck('product_id');
            
            $products = Product::whereIn('id', $likedProductIds)
            ->with(['purchases' => function($query) use ($user) {
                $query->where('user_id', $user->id); // 自分が購入した情報だけ
            }])
            ->get();
            return view('product_mylist', compact('products', 'page'));
        }
        return view('top', compact('products'));
    }

    public function detail ($item_id) {
        $user = Auth()->user();
        $product = Product::with('product_categories', 'condition')
            ->withCount('likes')
            ->withCount('comments')
            ->findOrFail($item_id);
        $product_categories = $product->product_categories;

        return view('product_detail', compact('product', 'product_categories', 'user'));
    }

    public function search (Request $request) {
        if(!empty($request->keyword)) {
            $products = Product::where(
                'product_name',  'LIKE', '%' . $request->keyword . '%'
            )->get();
            return view('top', compact('products'));
        }else{
            return redirect()->route('mylist');
        }
    }
    
    //--------ログイン後----------
     public function recommend (Request $request) {
        $page = $request->query('page');
        $user = auth()->user();
        $products = Product::where('user_id', '!=', auth()->id())
        ->with('purchases') // 商品の購入履歴を全て読み込む
        ->get();
        return view('top', compact('products', 'page'));
    }

    public function mylist () {
        return redirect()->route('mylist', ['tab' => 'mylist']);
    }

    public function item_search(Request $request) {
        if(!empty($request->keyword)) {
            $products = Product::where(
                'product_name',  'LIKE', '%' . $request->keyword . '%'
            )->get();
            return view('product_mylist', compact('products'));
        }else{
            return redirect()->route('mylist');
        }
    }
}
