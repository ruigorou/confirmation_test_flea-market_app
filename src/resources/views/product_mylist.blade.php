@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_list.css') }}">
@endsection
@section('content')
    <div class="productlist__nav">
        <div>
            <a class="recommend" href="{{ route('recommend') }}">おすすめ</a>
        </div>
        <div>
            <a class="mylist" href="{{ route('mylist', ['tab' => 'mylist']) }}">マイリスト</a>
        </div>
    </div>
        <div class="product_list">
            @foreach ($products as $product)
                <div class="product_card">
                    <div class="product_card__img">
                        <a href="{{ route('item.detail', $product->id) }}">
                            <img src="{{ asset('/storage/image/' . $product->image) }}" alt="商品画像">
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
    </form>
@endsection