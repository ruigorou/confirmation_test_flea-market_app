<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Like;

class MypageController extends Controller
{
    public function listed_item(Request $request) {
        $page = $request->query('page');
        $user = Auth()->user();
        $products = Product::where('user_id', $user->id)->get();
        return view('mypage', compact('user', 'products'));
    }
    public function  search(Request $request) {
        $user_id = auth()->user()->id;
        
        $query = Product::where('user_id', $user_id);

        if(!empty($request->keyword)) {
            $products = Product::where('user_id', $user_id)
                ->where( 'product_name',  'LIKE', '%' . $request->keyword . '%')
                ->get();

            $products = $query->get();
            return view('mypage', compact('products', 'user'));
        }
    }

    public function sell (Request $request) {
        //
    }
}
