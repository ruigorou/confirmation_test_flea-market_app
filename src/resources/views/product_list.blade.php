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
        <div class="product_card">
            <div class="product_card__img">
                <a href="">
                    <img src="" alt="">
                </a>
            </div>
        </div>
        <div class="product_card__title">
            <p>商品名</p>
        </div>
    </div>
@endsection