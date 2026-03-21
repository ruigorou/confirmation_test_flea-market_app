<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Requests\PurchaseRequest;
use App\Models\DeliveryAddress;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
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

    public function purchase_procedure (PurchaseRequest $request, $product_id) {
        $user = auth()->user();
        Purchase::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'payment' => $request->payment,
            'shipping_name' => $request->shipping_name,
            'shipping_postal_code' => $request->shipping_postal_code,
            'shipping_address' => $request->shipping_address,
            'shipping_building' => $request->shipping_building
        ]);
        return redirect()->route('mylist');
    }
}
