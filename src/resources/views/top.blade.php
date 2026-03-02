@extends('layouts.top_header')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection
@section('content')
    <div class="link-group">
        <div>
            <a class="recommend" href="">おすすめ</a>
        </div>
        <div>
            <a class="my-list" href="">マイリスト</a>
        </div>
    </div>
    <div class="product_list">
        @foreach ($products as $product)
            <div class="product_card">
                <div class="product_card__img">
                    <a href="{{ route('item.detail', $product->id)}}">
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