<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function toggle(Request $request, Product $product)
    {
        $user = Auth::user();
        
        if ($request->has('liked')) {
            // チェック ON → いいね作成
            Like::firstOrCreate([
                'user_id' => $user->id,
                'product_id' => $product->id
            ]);
        } else {
            // チェック OFF → いいね削除
            Like::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->delete();
        }

        return redirect()->route('item.detail', $product->id);
    }

}
