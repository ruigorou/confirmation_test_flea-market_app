<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\DeliveryAddress;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;


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
        User::find($user_id);
        DeliveryAddress::updateOrCreate(
            ['user_id' => $user_id],
            [
                'post' => $request->post,
                'address' => $request->address,
                'building' => $request->building
            ]
        );

        return redirect()->route('product.purchase', ['product_id' => $request->item_id]);
    }
}
