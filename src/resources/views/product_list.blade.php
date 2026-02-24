@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_list.css') }}">
@endsection
@section('content')
    <div class="productlist__nav">
        <div>
            おすすめ
        </div>
        <div>
            マイリスト
        </div>
    </div>
    <div class="product_list">
        @foreach ($products as $product)
            <div class="product_card">
                <div class="product_card__img">
                    <a href="">
                        <img src="{{ asset('/storage/image/' . $product->image) }}" alt="">
                    </a>
                </div>
                <div class="product_card__title">
                    <p>{{ $product->product_name }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection