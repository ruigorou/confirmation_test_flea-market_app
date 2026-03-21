@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_purchase.css') }}">
@endsection
@section('content')
    <form action="{{ route('purchase.procedure', ['product_id' => $product->id]) }}" method="post">
        @csrf
        <div class="purchase-content">
        <div class="left-column-content">
            <div class="product-group">
                <div class="product-image__group">
                    <img class="product-image" src="{{ asset('/storage/image/' . $product->image) }}" alt="product-image">
                </div>
                <div class="title-group">
                    <input type="hidden" name="shipping_name" value="{{ $product->product_name }}">
                    <label class="title-group__title">{{ $product->product_name }}</label>
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <p class="title-group__price">￥{{ number_format($product->price) }}</p>
                </div>
            </div>
            <div class="payment">
                <div class="payment-title-group">
                    <label class="payment-title-group__title">支払い方法</label>
                </div>
                <div class="payment-select-group">
                    @php
                        $payments = ['コンビニ支払い', 'カード支払い']
                    @endphp
                    <select id="payment-select" class="payment-select-group__select" name="payment">
                        <option value="">選択してください</option>
                        @foreach ($payments as $payment)
                            <option class="select" value="{{ $payment }}">{{ $payment }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                    @if($errors->has('payment'))
                        <div class="error">{{ $errors->first('payment') }}</div>
                    @endif
                </div>
            </div>
            <div class="shipping">
                <div class="shipping__header">
                    <div class="shipping__title-group">
                        <label class="shipping__title">配送先</label>
                    </div>
                    <div class="shipping__change">
                        <a class="shipping__change-link" href="{{ route('purchase.address', ['item_id'=> $product->id])}}">変更する</a>
                    </div>
                </div>
                <div class="shipping__address">
                    <input  name="shipping_postal_code" type="hidden" value="{{ $user->deliveryaddresses->first()->post ?? $user->profile->post }}">
                    <p class="shipping__post">〒 {{ $user->deliveryaddresses->first()->post ?? $user->profile->post }}</p>
                    <div class="form__error">
                        @if($errors->has('post'))
                            <div class="error">{{ $errors->first('post') }}</div>
                        @endif
                    </div>
                    <input name="shipping_address" type="hidden" value="{{ $user->deliveryaddresses->first()->address ?? $user->profile->address }}">
                    <p class="shipping__detail">{{ $user->deliveryaddresses->first()->address ?? $user->profile->address }}</p>
                    <div class="form__error">
                        @if($errors->has('address'))
                            <div class="error">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <input name="shipping_building" type="hidden" value="{{ $user->deliveryaddresses->first()->building ?? $user->profile->building }}">
                    <p class="shipping_building">{{ $user->deliveryaddresses->first()->building ?? $user->profile->building }}</p>
                </div>
            </div>
        </div>
        <div class="right-column-content">
            <div class="purchase-summary">
                <div class="purchase-summary__label">
                   商品代金
                </div>
                <div class="purchase-summary__value">
                    <p class="shipping_price">￥ {{ number_format($product->price) }}</p>
                </div>
            </div>
           <div class="purchase-summary__payment">
                <div class="purchase-summary__label">
                    支払い方法
                </div>
                <div class="purchase-summary__value">
                    <label id="payment-summary" class="purchase-summary__label">未設定</label>
                </div>
           </div>
           <div class="purchase-summary__button">
                <button class="purchase-summary__purchase-button" type="submit">購入する</button>
           </div>
        </div>
    </div>
    </form>
    <script src="{{ asset('js/payment.js')}}" defer></script>
@endsection