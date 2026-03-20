@extends('layouts.top_header')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_detail.css') }}">
@endsection
@section('content')
    <div class="product-content">
        <div class="product-image__group">
            <img class="detail-image" src="{{ asset('/storage/image/' . $product->image) }}" alt="product-image">
        </div>
        <div class="product-content__group">
            <div>
                <h1>{{ $product->product_name }}</h1>
            </div>
            <div>
                <p>{{ $product->brand }}</p>
            </div>
            <div>
                <p>¥<span class="product-content__price">{{ number_format($product->price) }}</span> (税込)</p>
            </div>
            <div class="logo-group">
               <div>
                    <form action="/like/{{ $product->id }}/toggle" method="POST">
                        @csrf
                        <label style="cursor:pointer">
                            <input class="like-check" type="checkbox" name="liked" value="1"
                                {{ $product->isLikedByUser() ? 'checked' : '' }}
                                onchange="this.form.submit()">
                            @if($product->isLikedByUser())
                                 <img src="{{ asset('image/ハートロゴ_ピンク.png') }}" width="30" onclick="this.previousElementSibling.click()">
                            @else
                                <img src="{{ asset('image/ハートロゴ_デフォルト.png') }}" width="30" onclick="this.previousElementSibling.click()">
                            @endif
                        </label>
                    </form>
                    <p>{{ $product->likes_count }}</p>
                </div>
                <div>
                    <div>
                        <img class="logo-group__item" src="{{ asset('image/ふきだしロゴ.png') }}" alt="吹き出し">
                    </div>
                    <div>
                        <p>{{ $product->comments_count }}</p>
                    </div>
                </div>
            </div>
            <div>
                <form action="{{ route('product.purchase', $product->id) }}" method="get">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button class="product-content__purchase">購入手続きへ</button>
                </form>
            </div>
            <div>
                <h2>商品説明</h2>
            </div>
            <div>
                <p>{{ $product->product_description }}</p>
            </div>
            <div>
                <h2>商品の情報</h2>
            </div>
            <div class="categories-group">
                <div>
                    <p cl class="categories-group__title">カテゴリー</p>
                </div>
                <div>
                <ul class="categories-item__group">
                    @foreach ($product_categories as $category)
                    <li class="categories-item__item">
                        {{ $category->category }}
                    </li>
                    @endforeach
                </ul>
                </div>
            </div>
            <div class="product-condition-group">
                <div>
                    <p class="product-condition-group__title">商品の状態</p>
                </div>
                <div>
                    <p class="product-condition-group__condition">{{ $product->condition->name }}</p>
                </div>
            </div>
            <div>
                <h2>コメント(<span>{{ $product->comments_count }}</span>)</h2>
            </div>
            <div class="admin-group">
                <div class="admin-image__box">
                    @auth
                        <img class="image_output" id="image_output" src="{{ $user->profile?->image ? asset('storage/image/' . $user->profile->image) : ''}}">
                    @endauth
                </div>
                <div>
                    <p class="admin-name">
                        @auth
                            {{ $user->name }}
                        @endauth
                    </p>
                </div>
            </div>
            <div>
                <p class="coment-title">商品へのコメント</p>
            </div>
            <form action="/comment" method="post">
                @csrf
                <div>
                    <textarea class="coment-area" name="comment">{{ old('comment') }}</textarea>
                </div>
                <div class="form__error">
                    @error('comment')
                        {{ $message }}
                    @enderror
                </div>
                <div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button class="coment-submit" type="submit">コメントを送信する</button>
                </div>
            </form>
        </div>
    </div>
@endsection