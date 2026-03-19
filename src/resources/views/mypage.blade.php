@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection
@section('content')
    <div class="profile">
        <div class="profile__info">
            <div class="profile__image-group">
                <img class="image_output" id="image_output" src="{{ asset('storage/image/' . $user->profile->image)}}">
            </div>
            <div class="profile__name">
                <h2>{{ $user->name }}</h2>
            </div>
        </div>
        <div class="profile__actions">
            <a class="profile__edit-link" href="{{ route('profile') }}">プロフィールを編集</a>
        </div>
    </div>
    <div class="item-tabs">
        <div class="item-tabs__tab--sell">
            <a class="item-tabs__tab--sell-link" href="{{ route('mypage', ['page' => 'sell']) }}">出品した商品</a>
        </div>
        <div class="item-tabs__tab--buy">
            <div class="item-tabs__tab--sell">
            <a class="item-tabs__tab--sell-buy" href="{{ route('mypage', ['page' => 'buy']) }}">購入した商品</a>
        </div>
        </div>
    </div>
     <div class="product_list">
            @foreach ($products as $product)
                <div class="product_card">
                    <div class="product_card__img">
                        <a href="{{ route('item.detail', $product->id) }}">
                            <img src="{{ asset('/storage/image/' . $product->image) }}">
                        </a>
                    </div>
                    <div class="product_card__title">
                        <p>{{ $product->product_name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    <script src="{{ asset('js/image_call.js')}}"></script>
@endsection