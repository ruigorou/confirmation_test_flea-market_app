<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;

class ProductPurchaseController extends Controller
{
    public function purchase(Request $request) {
        $user = Auth()->user();
        $product = Product::find($request->product_id);
        return view('product_purchase', compact('product', 'user'));
    }

    public function delivery_address($item_id) {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('delivery_address', compact('user', 'item_id'));
    }

    public function address_update (AddressRequest $request) {
        $user_id = Auth()->user()->id;
        $user = User::find($user_id);
        $profile = Profile::where('user_id', $user->id);
        $profile->update([
                'post' => $request->post,
                'address' => $request->address,
                'building' => $request->building
            ]);

        return redirect()->route('product.purchase', ['product_id' => $request->item_id]);
    }
}
