@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_purchase.css') }}">
@endsection
@section('content')
    <div class="purchase-content">
        <div class="left-column-content">
            <div class="product-group">
                <div class="product-image__group">
                    <img class="product-image" src="{{ asset('/storage/image/' . $product->image) }}" alt="product-image">
                </div>
                <div class="title-group">
                    <label class="title-group__title">{{ $product->product_name }}</label>
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
                        <option>選択してください</option>
                        @foreach ($payments as $payment)
                            <option class="select" value="{{ $payment }}">{{ $payment }}</option>
                        @endforeach
                    </select>
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
                    <p class="shipping__post">〒 {{ $user->deliveryaddresses->first()->post ?? $user->profile->post }}</p>
                    <p class="shipping__detail">{{ $user->deliveryaddresses->first()->address ?? $user->profile->address }}{{ $user->deliveryaddresses->first()->building ?? $user->profile->building }}</p>
                </div>
            </div>
        </div>
        <div class="right-column-content">
            <div class="purchase-summary">
                 <div class="purchase-summary__price">
                    <p class="purchase-summary__label">商品代金</p>
                </div>
                <div class="purchase-summary__value">
                    <p>￥ {{ number_format($product->price) }}</p>
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
                <button class="purchase-summary__purchase-button">購入する</button>
           </div>
        </div>
    </div>
    <script src="{{ asset('js/payment.js')}}"></script>
@endsection