@extends('layouts.top_header')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection
@section('content')
   <div class="productlist__nav">
        <div>
            <a class="recommend" href="{{ route('recommend') }}">おすすめ</a>
        </div>
        <div>
            <form action="{{ route('mylist') }}" method="post">
                @csrf
                <button class="mylist">マイリスト</button>
            </form>
        </div>
    </div>
    <div class="product_list">
        @foreach ($products as $product)
            <div class="product_card">
                <div class="product_card__img">
                    <a href="{{ route('item.detail', $product->id)}}">
                        <img src="{{ asset('/storage/image/' . $product->image) }}">
                    </a>
                    @if($product->purchases->isNotEmpty())
                        <span class="label-sold">SOLD</span>
                    @endif
                </div>
                <div class="product_card__title">
                    <p>{{ $product->product_name }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection